# Скопировать SC deliverables локально без Context sync.
# Запуск: PowerShell, из папки privarka после git pull.
#   powershell -NoProfile -ExecutionPolicy Bypass -File .\upload\sc-section-deliverables\save-sc-deliverables-local.ps1

$ErrorActionPreference = "Stop"
$repoRoot = (git rev-parse --show-toplevel 2>$null)
if (-not $repoRoot) {
    Write-Host "Запустите из клонированного репозитория privarka (git pull сначала)."
    exit 1
}
Set-Location $repoRoot
git pull --ff-only 2>$null | Out-Host

$src = Join-Path $repoRoot "upload\sc-section-deliverables"
if (-not (Test-Path $src)) {
    Write-Host "Нет папки $src — сделайте git pull (коммит Add SC section deliverables)."
    exit 1
}

# Куда копировать: P: если есть subst, иначе корень сайта
$destCandidates = @(
    "P:\upload\sc-section-deliverables",
    "E:\Работа\OSPanel\domains\privarka\upload\sc-section-deliverables",
    (Join-Path $env:USERPROFILE "Desktop\privarka-sc-deliverables")
)
$dest = $null
foreach ($d in $destCandidates) {
    $parent = Split-Path $d -Parent
    if ($d -like "P:\*" -and (Test-Path "P:\")) { $dest = $d; break }
    if ($d -like "E:\*" -and (Test-Path $parent)) { $dest = $d; break }
}
if (-not $dest) { $dest = $destCandidates[-1] }

New-Item -ItemType Directory -Force -Path $dest | Out-Null
Copy-Item -Path (Join-Path $src "*") -Destination $dest -Force
Write-Host "Готово. Файлы:"
Get-ChildItem $dest | ForEach-Object { Write-Host "  $($_.FullName)" }
Write-Host ""
Write-Host "Откройте sc-duplicate-removal.xlsx и sc-missing-import.xlsx"
