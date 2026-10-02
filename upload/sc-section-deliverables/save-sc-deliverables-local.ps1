# Copy SC deliverables to P:\ or Desktop (ASCII-only for Windows PowerShell).
# Run from privarka repo after git pull:
#   powershell -NoProfile -ExecutionPolicy Bypass -File .\upload\sc-section-deliverables\save-sc-deliverables-local.ps1

$ErrorActionPreference = "Stop"

$repoRoot = git rev-parse --show-toplevel 2>$null
if (-not $repoRoot) {
    Write-Host "ERROR: run inside privarka git repo (cd ...\privarka)."
    exit 1
}
Set-Location $repoRoot

$src = Join-Path $repoRoot "upload\sc-section-deliverables"
if (-not (Test-Path $src)) {
    Write-Host "ERROR: missing folder: $src"
    Write-Host "Run: git pull"
    exit 1
}

Write-Host "Source (already after pull): $src"
Get-ChildItem $src -File | ForEach-Object { Write-Host "  $($_.Name)" }

$dest = $null
if (Test-Path "P:\") {
    $dest = "P:\upload\sc-section-deliverables"
} else {
    $dest = Join-Path $env:USERPROFILE "Desktop\privarka-sc-deliverables"
}

New-Item -ItemType Directory -Force -Path $dest | Out-Null
Copy-Item -Path (Join-Path $src "*") -Destination $dest -Force

Write-Host ""
Write-Host "Copied to: $dest"
Get-ChildItem $dest -File | ForEach-Object { Write-Host "  $($_.FullName)" }
Write-Host ""
Write-Host "Open: sc-duplicate-removal.xlsx, sc-missing-import.xlsx"
