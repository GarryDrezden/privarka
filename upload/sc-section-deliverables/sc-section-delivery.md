# SC: дубли и недостающие для заливки

## Что сравнивали

- **Экспорт Bitrix:** `_________________7dc9.xls` (using full export _________________7dc9.xls (2608 rows)).
- **Фильтр SC:** Строка SC, если URL содержит korotkogo-tsikla-sc или krepezh-dlya-korotkogo-tsikla-sc; или в колонках ISECT*/«раздел» (без учёта префикса артикула) есть «коротк»+«цикл», либо отдельное «SC» в названии раздела крепежа (не ARC/CD).
- **Эталон SKU (union):** ae55 (если есть), cs*.csv, xlsx SC в repo, артикулы из [arc-cd-sc-audit.md](/cursor/stores/self/docs/arc-cd-sc-audit.md) (раздел SC) и `import-vs-export-audit-data.json`.

## Счётчики

| Метрика | Значение |
|---------|----------|
| Строк SC в экспорте | **117** |
| Уникальных артикулов SC в экспорте | **112** |
| Групп дублей | **4** |
| Строк к удалению (`to_delete`) | **5** |
| Target SKU (union на VM) | **178** (ожидание папки **1041**) |
| Missing (target − export SC) | **68** |
| Строк import (`missing_import`) | **68** |
| Неполные карточки в SC | **44** |

### Источники target SKU

  - SC_ae55_import_file: 163
  - arc_cd_sc_audit_md_sc_section: 13
  - csv_cs_2022: 81
  - import_vs_export_audit_json: 36
  - import_vs_export_sc_notes: 5
  - kda_sc_xls_899: 119

## Файлы

- [sc-duplicate-removal.xlsx](/cursor/stores/self/docs/sc-duplicate-removal.xlsx)
- [sc-missing-import.xlsx](/cursor/stores/self/docs/sc-missing-import.xlsx)

## Допущения

- Keeper в группе дублей: максимум richness (заполненность + вес полей) и дата изменения, как в `duplicates_and_readiness_run.py`.
- Без `SC_____________ae55.xlsx` на VM колонки шаблона взяты из `duplicates-summary.json`; поля заполняются из `kda.importexcel` SC xls где совпадает артикул.
- Union target **не равен** полным 1041 из `P:\…\_SC` до загрузки локальной папки или JSON.