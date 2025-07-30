<?
Global $APPLICATION;
//echo $_SERVER['REQUEST_URI'];
//Гибкие упоры черная сталь
if($_SERVER['REQUEST_URI'] == "/krepezh/privarnoy_krepyezh/krepezh_dlya_dugovoy_svarki_arc/filter/mount_type-is-%D0%B3%D0%B8%D0%B1%D0%BA%D0%B8%D0%B9%20%D1%83%D0%BF%D0%BE%D1%80/work_materials-is-2c9430c925a1b635d8f45b2c2db11c78/apply/"){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/flexible_stops_black_steel.php"), 
            Array(), 
            Array("MODE"=>"php")
        );?>
    </details>
<?}?>
<?
//Гибкие упоры нержавеющая сталь
if($_SERVER['REQUEST_URI'] == ""){?>?>
    <details open>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/flexible_stops_stainless_steel.php"), 
            Array(), 
            Array("MODE"=>"php")
        );?>
    </details>
<?}?>
<?//Нерезьбовая шпилька омедненная
if($_SERVER['REQUEST_URI'] == "/krepezh/privarnoy_krepyezh/krepezh_dlya_kondensatornoy_svarki_cd/filter/mount_type-is-%D0%BD%D0%B5%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D1%88%D0%BF%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0/work_materials-is-0e689886f0408db1c1bf1ffcf503a578/apply/"){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/non_threaded_rod_copper_plated.php"), 
            Array(), 
            Array("MODE"=>"php")
        );?>
    </details>
<?}?>
<?//Нерезьбовая шпилька нержавеющая сталь
if($_SERVER['REQUEST_URI'] == "/krepezh/privarnoy_krepyezh/krepezh_dlya_kondensatornoy_svarki_cd/filter/mount_type-is-%D0%BD%D0%B5%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D1%88%D0%BF%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0/work_materials-is-955bf239d420ce5d5d8c8d7a0343903f/apply/"){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/non_threaded_rod_stainless_steel.php"), 
            Array(), 
            Array("MODE"=>"php")
        );?>
    </details>
<?}?>
<?//Нерезьбовая шпилька алюминиевая
if($_SERVER['REQUEST_URI'] == "/krepezh/privarnoy_krepyezh/krepezh_dlya_kondensatornoy_svarki_cd/filter/mount_type-is-%D0%BD%D0%B5%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D1%88%D0%BF%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0/work_materials-is-e8fdeaf4b60f01947fbceb4af21ea5a3/apply/"){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/non_threaded_rod_aluminum.php"), 
            Array(), 
            Array("MODE"=>"php")
        );?>
    </details>
<?}?>
<?//Нерезьбовая шпилька латунная
if($_SERVER['REQUEST_URI'] == "/krepezh/privarnoy_krepyezh/krepezh_dlya_kondensatornoy_svarki_cd/filter/mount_type-is-%D0%BD%D0%B5%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D1%88%D0%BF%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0/work_materials-is-45acdcdd11352791e1e040456ac50e3e/apply/"){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/non_threaded_rod_brass.php"), 
        Array(), 
        Array("MODE"=>"php")
    );?>
    </details>
<?}?>
<?//Резьбовая шпилька под покраску омедненная
if($_SERVER['REQUEST_URI'] == "/krepezh/privarnoy_krepyezh/krepezh_dlya_kondensatornoy_svarki_cd/filter/mount_type-is-%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D1%88%D0%BF%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0%20%D0%BF%D0%BE%D0%B4%20%D0%BF%D0%BE%D0%BA%D1%80%D0%B0%D1%81%D0%BA%D1%83/work_materials-is-0e689886f0408db1c1bf1ffcf503a578/apply/"){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_rod_copper_plated_for_painting.php"), 
        Array(), 
        Array("MODE"=>"php")
    );?>
    </details>
<?}?>
<?//Резьбовая шпилька под покраску нержавеющая сталь
if($_SERVER['REQUEST_URI'] == ""){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_rod_stainless_steel_for_painting.php"), 
        Array(), 
        Array("MODE"=>"php")
    );?>
    </details>
<?}?>
<?//Резьбовая шпилька под покраску алюминиевая
if($_SERVER['REQUEST_URI'] == ""){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_rod_aluminum_for_painting.php"), 
        Array(), 
        Array("MODE"=>"php")
    );?>
    </details>
<?}?>
<?//Резьбовая шпилька под покраску латунная
if($_SERVER['REQUEST_URI'] == ""){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_rod_brass_for_painting.php"), 
            Array(), 
            Array("MODE"=>"php")
        );?>
    </details>
<?}?>
<?//Резьбовая шпилька омедненная
if($_SERVER['REQUEST_URI'] == "/krepezh/privarnoy_krepyezh/krepezh_dlya_kondensatornoy_svarki_cd/filter/mount_type-is-%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D1%88%D0%BF%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0/work_materials-is-0e689886f0408db1c1bf1ffcf503a578/apply/"){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_rod_copper_plated.php"), 
            Array(), 
            Array("MODE"=>"php")
        );?>
    </details>
<?}?>
<?//Резьбовая шпилька нержавеющая сталь
if($_SERVER['REQUEST_URI'] == "/krepezh/privarnoy_krepyezh/krepezh_dlya_kondensatornoy_svarki_cd/filter/mount_type-is-%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D1%88%D0%BF%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0/work_materials-is-955bf239d420ce5d5d8c8d7a0343903f/apply/"){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_rod_stainless_steel.php"), 
            Array(), 
            Array("MODE"=>"php")
        );?>
    </details>
<?}?>
<?//Резьбовая шпилька алюминиевая
if($_SERVER['REQUEST_URI'] == "/krepezh/privarnoy_krepyezh/krepezh_dlya_kondensatornoy_svarki_cd/filter/mount_type-is-%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D1%88%D0%BF%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0/work_materials-is-e8fdeaf4b60f01947fbceb4af21ea5a3/apply/"){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_rod_aluminum.php"), 
        Array(), 
        Array("MODE"=>"php")
    );?>
    </details>
<?}?>
<?//Резьбовая шпилька латунная
if($_SERVER['REQUEST_URI'] == "/krepezh/privarnoy_krepyezh/krepezh_dlya_kondensatornoy_svarki_cd/filter/mount_type-is-%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D1%88%D0%BF%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0/work_materials-is-45acdcdd11352791e1e040456ac50e3e/apply/"){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_rod_brass.php"), 
            Array(), 
            Array("MODE"=>"php")
        );?>
    </details>
<?}?>
<?//Втулка омедненная
if($_SERVER['REQUEST_URI'] == "/krepezh/privarnoy_krepyezh/krepezh_dlya_kondensatornoy_svarki_cd/filter/mount_type-is-%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D0%B2%D1%82%D1%83%D0%BB%D0%BA%D0%B0/work_materials-is-0e689886f0408db1c1bf1ffcf503a578/apply/"){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/copper_plated_bushing.php"), 
        Array(), 
        Array("MODE"=>"php")
    );?>
    </details>
<?}?>
<?//Втулка нержавеющая сталь
if($_SERVER['REQUEST_URI'] == "/krepezh/privarnoy_krepyezh/krepezh_dlya_kondensatornoy_svarki_cd/filter/mount_type-is-%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D0%B2%D1%82%D1%83%D0%BB%D0%BA%D0%B0/work_materials-is-955bf239d420ce5d5d8c8d7a0343903f/apply/"){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/stainless_steel_bushing.php"), 
        Array(), 
        Array("MODE"=>"php")
    );?>
    </details>
<?}?>
<?//Втулка алюминиевая
if($_SERVER['REQUEST_URI'] == "/krepezh/privarnoy_krepyezh/krepezh_dlya_kondensatornoy_svarki_cd/filter/mount_type-is-%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D0%B2%D1%82%D1%83%D0%BB%D0%BA%D0%B0/work_materials-is-e8fdeaf4b60f01947fbceb4af21ea5a3/apply/"){?>
    <details open>
        <summary>Таблица типоразмеров</summary>
        <?$APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/aluminum_bushing.php"), 
        Array(), 
        Array("MODE"=>"php")
    );?>
    </details>
<?}?>
<!-- Шпилька запрессовочная резьбовая -->
    <?//Шпилька запрессовочная резьбовая CFHA
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-cfha') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-CFHA.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая CFHC
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-cfhc') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-CFHC.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая CHA
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-cha') !== false || stripos($_SERVER['REQUEST_URI'],'or-cha') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-CHA.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая CHC
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-chc') !== false || stripos($_SERVER['REQUEST_URI'],'or-chc') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-CHC.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая HFHS
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-hfhs') !== false
    && stripos($_SERVER['REQUEST_URI'],'or-hfh') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-HFHS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая HFH
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-hfh%') !== false 
    && stripos($_SERVER['REQUEST_URI'],'or-hfhs') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-HFH.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая FH4
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-fh4') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-FH4.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая FHA
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-fha') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-FHA.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая FHL
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-fhl%') !== false && stripos($_SERVER['REQUEST_URI'],'or-fhls') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-FHL.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая FHLS
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-fhls') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-FHLS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая FHS
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-fhs') !== false &&
    stripos($_SERVER['REQUEST_URI'],'-fh4') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-FHS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая HFE
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-hfe') !== false && stripos($_SERVER['REQUEST_URI'],'work_materials-is-0550') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-HFE.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая KFH
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-kfh') !== false && stripos($_SERVER['REQUEST_URI'],'work_materials-is-7939') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-KFH.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая FH
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-fh%') !== false &&
    stripos($_SERVER['REQUEST_URI'],'-fhs') == false &&
    stripos($_SERVER['REQUEST_URI'],'-fh4') == false &&
    stripos($_SERVER['REQUEST_URI'],'-fha') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-FH.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая TFH
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-tfh%') !== false && stripos($_SERVER['REQUEST_URI'],'or-tfhs') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-TFH.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная резьбовая TFHS
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-tfhs') !== false && stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-tfh%') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-TFHS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька «Рождественская елка»
    if(stripos($_SERVER['REQUEST_URI'],'%D1%88%D0%BF%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0%20%C2%AB%D1%80%D0%BE%D0%B6%D0%B4%D0%B5%D1%81%D1%82%D0%B2%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F%20%D0%B5%D0%BB%D0%BA%D0%B0%C2%BB') !== false && stripos($_SERVER['REQUEST_URI'],'work_materials-is-0e689886f0408db1c1bf1ffcf503a578') == !false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/welded_stud_Christmas_tree.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
<!-- Шпилька запрессовочная без резьбы -->
    <?//Шпилька запрессовочная без резьбы TP4
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-tp4') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_non_threaded_studs_TP4.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная без резьбы TPS
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-tps') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_non_threaded_studs_TPS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Шпилька запрессовочная без резьбы TP
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-tp%20') !== false 
        && stripos($_SERVER['REQUEST_URI'],'or-tp4%') == false
        && stripos($_SERVER['REQUEST_URI'],'or-tps') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_non_threaded_studs_TP.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
<!-- Гайка запрессовочная резьбовая -->
    <?//Гайка запрессовочная резьбовая FEX FEOX
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/zapressovochnyy_krepyezh/gayka-zapressovochnaya-rezbovaya/filter/work_materials-is-955bf239d420ce5d5d8c8d7a0343903f/press_fitting_type-is-feox%20%D0%BD%D0%B5%D1%80%D0%B6%D0%B0%D0%B2%D0%B5%D1%8E%D1%89%D0%B0%D1%8F%20%D1%81%D1%82%D0%B0%D0%BB%D1%8C-or-fex%20%D0%BD%D0%B5%D1%80%D0%B6%D0%B0%D0%B2%D0%B5%D1%8E%D1%89%D0%B0%D1%8F%20%D1%81%D1%82%D0%B0%D0%BB%D1%8C/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_press_fit_nut_FEX_FEOX.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая FE FEO
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/zapressovochnyy_krepyezh/gayka-zapressovochnaya-rezbovaya/filter/work_materials-is-955bf239d420ce5d5d8c8d7a0343903f/press_fitting_type-is-fe%20%D0%BD%D0%B5%D1%80%D0%B6%D0%B0%D0%B2%D0%B5%D1%8E%D1%89%D0%B0%D1%8F%20%D1%81%D1%82%D0%B0%D0%BB%D1%8C-or-feo%20%D0%BD%D0%B5%D1%80%D0%B6%D0%B0%D0%B2%D0%B5%D1%8E%D1%89%D0%B0%D1%8F%20%D1%81%D1%82%D0%B0%D0%BB%D1%8C-or-ul%20%D0%BD%D0%B5%D1%80%D0%B6%D0%B0%D0%B2%D0%B5%D1%8E%D1%89%D0%B0%D1%8F%20%D1%81%D1%82%D0%B0%D0%BB%D1%8C/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_press_fit_nut_FE_FEO.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая AC
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is-ac%20') !== false 
    && stripos($_SERVER['REQUEST_URI'],'or-as') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_AC.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая AS
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is-as%20') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_AS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая B
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is-b%20') !== false 
    && stripos($_SERVER['REQUEST_URI'],'or-bs') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_B.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая BS
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is-bs%20') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_BS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая CFN
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-cfn%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-0550') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_CFN.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая CLA
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is-cla%20') !== false 
    && stripos($_SERVER['REQUEST_URI'],'or-cls') == false
    && stripos($_SERVER['REQUEST_URI'],'or-s') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_CLA.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая CLS
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is-cls%20') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_CLS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая F
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-f%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-955') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_F.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая H
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-h%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-0550') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_H.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая F4
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is-f4%20') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_F4.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая k_series
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-k-nut%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-0550') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_k_series.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая KF2
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is-kf2%20') !== false 
    && stripos($_SERVER['REQUEST_URI'],'or-kfs2') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_KF2.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая KFS2
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is-kfs2%20') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_KFS2.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая LAC
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is-lac%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'or-las') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_LAC.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая LAS
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-las%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-30a86') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_LAS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая PL
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is') !== false
    && stripos($_SERVER['REQUEST_URI'],'%20pl%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'plc') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_PL.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая PLC
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is') !== false
    && stripos($_SERVER['REQUEST_URI'],'%20plc%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'pl%') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_PLC.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая S
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is-s%20') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_S.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая SL
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-sl%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-0550') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_SL.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая SMPS
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-smps%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-955b') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_SMPS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка запрессовочная резьбовая SP4
    if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya/filter/press_fitting_type-is-sp4%20') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_SP4.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
<!-- Втулка запрессовочная -->
<?//Втулка запрессовочная BSO
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-bso%20') !== false
        && stripos($_SERVER['REQUEST_URI'],'or-bso4') == false
        && stripos($_SERVER['REQUEST_URI'],'or-bsos') == false
        && stripos($_SERVER['REQUEST_URI'],'or-bsoa') == false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_BSO.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная BSO4
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-bso4%20') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_BSO4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная BSOA
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-bsoa%20') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_BSOA.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная BSOS
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-bsos%20') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_BSOS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная CSOS_2_4
        if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-csos%20') !== false
        && stripos($_SERVER['REQUEST_URI'],'work_materials-is-955b') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_CSOS_2_4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная CSS_16
        if(stripos($_SERVER['REQUEST_URI'],'or-css%') !== false
        && stripos($_SERVER['REQUEST_URI'],'work_materials-is-955b') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_CSS_16.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная DSO
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-dsos%20') !== false
        && stripos($_SERVER['REQUEST_URI'],'or-dso') == false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_DSO.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная DSOS
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'work_materials-is-955b') !== false
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-dsos%') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_DSOS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная KFE_3_4
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-kfe%20') !== false
        && stripos($_SERVER['REQUEST_URI'],'or-kfse') == false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_KFE_3_4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная KFE_36_42
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-kfe%20') !== false
        && stripos($_SERVER['REQUEST_URI'],'or-kfse') == false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_KFE_36_42.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная KFSE_3_4
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-kfse%20') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_KFSE_3_4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная KFSE_36_42
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-kfse%20') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_KFSE_36_42.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная MSO4
        if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-mso4%20') !== false
        && stripos($_SERVER['REQUEST_URI'],'work_materials-is-955b') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_MSO4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SKC
        if(stripos($_SERVER['REQUEST_URI'],'/krepezh/zapressovochnyy_krepyezh/vtulka_zapressovochnaya/filter/work_materials-is-955bf239d420ce5d5d8c8d7a0343903f/press_fitting_type-is-skc%20%D1%81%D0%BE%D0%B5%D0%B4%D0%B8%D0%BD%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%B4%D0%BB%D1%8F%20%D1%81%D0%BB%D0%B0%D0%B9%D0%B4%D0%BE%D0%B2%20%D0%BD%D0%B5%D1%80%D0%B6%D0%B0%D0%B2%D0%B5%D1%8E%D1%89%D0%B0%D1%8F%20%D1%81%D1%82%D0%B0%D0%BB%D1%8C/apply/') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SKC.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SO
        if(stripos($_SERVER['REQUEST_URI'],'zapressovochnyy_krepyezh/vtulka_zapressovochnaya/filter/press_fitting_type-is-so%20') !== false
        && stripos($_SERVER['REQUEST_URI'],'or-so4') == false
        && stripos($_SERVER['REQUEST_URI'],'or-sos') == false
        && stripos($_SERVER['REQUEST_URI'],'or-soa') == false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SO.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SO4
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-so4%20') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SO4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SOA
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-soa%20') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SOA.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SOAG
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-soag%20') !== false 
        && stripos($_SERVER['REQUEST_URI'],'or-sosg') == false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SOAG.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SOS
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-sos%20') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SOS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SOSG
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-sosg%20') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SOSG.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SSA
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-ssa%20') !== false
        && stripos($_SERVER['REQUEST_URI'],'or-ssc') == false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SSA.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SSC
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-ssc%20') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SSC.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SSS
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya/filter/press_fitting_type-is-sss%20') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SSS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная TSO
        if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-%D0%B2%D1%82%D1%83%D0%BB%D0%BA%D0%B0%20%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D0%B7%D0%B0%D0%BF%D1%80%D0%B5%D1%81%D1%81%D0%BE%D0%B2%D0%BE%D1%87%D0%BD%D0%B0%D1%8F%20tso%20%D0%BE%D1%86%D0%B8%D0%BD%D0%BA%D0%BE%D0%B2%D0%B0%D0%BD%D0%BD%D0%B0%D1%8F%20%D1%81%D1%82%D0%B0%D0%BB%D1%8C/apply/') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_TSO.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная TSOS
        if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-%D0%B2%D1%82%D1%83%D0%BB%D0%BA%D0%B0%20%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D0%B7%D0%B0%D0%BF%D1%80%D0%B5%D1%81%D1%81%D0%BE%D0%B2%D0%BE%D1%87%D0%BD%D0%B0%D1%8F%20%20tsos%20%D0%BD%D0%B5%D1%80%D0%B6%D0%B0%D0%B2%D0%B5%D1%8E%D1%89%D0%B0%D1%8F%20%D1%81%D1%82%D0%B0%D0%BB%D1%8C/apply/') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_TSOS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
<!-- Винт невыпадающий -->
    <?//Винт невыпадающий PF11
    if(stripos($_SERVER['REQUEST_URI'],'vint_nevypadayushchiy') == !false
    && stripos($_SERVER['REQUEST_URI'],'pf11') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PF11.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PF31
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-pf31%20') !== false
    // || stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-pf32%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-30a8') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PF31.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PF50
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is') == !false
    && stripos($_SERVER['REQUEST_URI'],'pf50') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-955b') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PF50.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PFC2
    if(stripos($_SERVER['REQUEST_URI'],'vint_nevypadayushchiy/filter/press_fitting_type-is-pfc2%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'or-pfs2') == false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PFC2.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PFC2P
    if(stripos($_SERVER['REQUEST_URI'],'vint_nevypadayushchiy/filter/press_fitting_type-is-pfc2p%20') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PFC2P.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PFHV
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-pfhv%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-0550') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PFHV.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PFS2
    if(stripos($_SERVER['REQUEST_URI'],'vint_nevypadayushchiy/filter/press_fitting_type-is-pfs2%20') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PFS2.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PTL2
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-ptl2%20') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-955b') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PTL2.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
<!-- Запрессовочные аксессуары -->
    <?//Гайка развальцовочная RMHB GS
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-rmhb') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-955b') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fitting_accessories_RMHB_GS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка развальцовочная RMHB GZ
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-rmhb') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-0550') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fitting_accessories_RMHB_GZ.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка развальцовочная RHB GS
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-rhb') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-955b') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fitting_accessories_RHB_GS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка развальцовочная RHB GZ
    if(stripos($_SERVER['REQUEST_URI'],'press_fitting_type-is-rhb') !== false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-0550') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fitting_accessories_RHB_GZ.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Колпачки
    if(stripos($_SERVER['REQUEST_URI'],'/shpilka_zapressovochnaya_rezbovaya/filter/mount_type-is-%D0%BA%D0%BE%D0%BB%D0%BF%D0%B0%D1%87%D0%BE%D0%BA/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fitting_accessories_SMC2.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
<!-- Болт заземления -->
    <?//Болт заземления CD (омедненные)
    if(stripos($_SERVER['REQUEST_URI'],'mount_type-is-%D0%B1%D0%BE%D0%BB%D1%82%20%D0%B7%D0%B0%D0%B7%D0%B5%D0%BC%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F/') !== false 
    && stripos($_SERVER['REQUEST_URI'],'krepezh-dlya-korotkogo-tsikla-sc') == false
    && stripos($_SERVER['REQUEST_URI'],'work_materials-is-0e689886f0408db1c1bf1ffcf503a578') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/ground_bolt_cd_copper_plated.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Болт заземления CD (нержавейка)
    if(stripos($_SERVER['REQUEST_URI'],'mount_type-is-%D0%B1%D0%BE%D0%BB%D1%82%20%D0%B7%D0%B0%D0%B7%D0%B5%D0%BC%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F/') !== false && 
    stripos($_SERVER['REQUEST_URI'],'work_materials-is-955bf239d420ce5d5d8c8d7a0343903f') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/ground_bolt_cd_steel.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Болт заземления ARC (никель)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh-dlya-korotkogo-tsikla-sc/filter/mount_type-is-%D0%B1%D0%BE%D0%BB%D1%82%20%D0%B7%D0%B0%D0%B7%D0%B5%D0%BC%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F') !== false && 
    stripos($_SERVER['REQUEST_URI'],'ed8ebc997d209c67fe6b85deb2567a35') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/ground_bolt_arc_nickel.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Болт заземления ARC (омедненные)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh-dlya-korotkogo-tsikla-sc/filter/mount_type-is-%D0%B1%D0%BE%D0%BB%D1%82%20%D0%B7%D0%B0%D0%B7%D0%B5%D0%BC%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F') !== false && 
    stripos($_SERVER['REQUEST_URI'],'0e689886f0408db1c1bf1ffcf503a578') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/ground_bolt_arc_cooper.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
<!-- Закладный гайки -->
    <?//Закладный гайки 1
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/zakladnye-gayki/filter/article-is-5303-a-or-5303-b-or-5303-c-or-5303-d-or-5304-a-or-5304-b-or-5304-c-or-5304-d/apply/') !== false ||
    stripos($_SERVER['REQUEST_URI'],'/krepezh/zakladnye-gayki/filter/article-is-673-a-or-673-b-or-674-a-or-674-b-or-675-a-or-675-b/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/square1.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Закладный гайки 2
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/zakladnye-gayki/filter/article-is-834-0-or-834-a-or-834-b-or-834-c-or-835-0-or-835-a-or-835-a%20%D1%81%D1%82%D0%B0%D0%BB%D1%8C%20%D0%BD%D0%B5%D1%80%D0%B6%D0%B0%D0%B2%D0%B5%D1%8E%D1%89%D0%B0%D1%8F%20dg5115bti-or-835-b-or-835-c-or-835-d-or-836-0-or-836-a-or-836-b-or-836-c-or-836-d/apply/') !== false ||
    stripos($_SERVER['REQUEST_URI'],'/krepezh/zakladnye-gayki/filter/article-is-904-as-or-905-as-or-905-bs-or-905-cs-or-906-as-or-906-bs-or-906-cs/apply/') !== false  ||
    stripos($_SERVER['REQUEST_URI'],'/krepezh/zakladnye-gayki/filter/article-is-954-a-or-954-b-or-955-a-or-955-a%20%D1%81%D1%82%D0%B0%D0%BB%D1%8C%20%D0%BD%D0%B5%D1%80%D0%B6%D0%B0%D0%B2%D0%B5%D1%8E%D1%89%D0%B0%D1%8F%20dg6115a-ti-or-955-as-or-955-b-or-955-c-or-956-a-or-956-b-or-956-c/apply/') !== false  ||
    stripos($_SERVER['REQUEST_URI'],'/krepezh/zakladnye-gayki/filter/article-is-1231-a-or-1231-b-or-1231-c-or-1236-a-or-1236-b-or-1236bxx%20сталь%20нержавеющая-or-1238-a-or-1238-as%2A-or-1238-b-or-1238-c-or-1238-d/apply/') !== false  ||
    stripos($_SERVER['REQUEST_URI'],'/krepezh/zakladnye-gayki/filter/article-is-1408-b-or-1408-d-or-1408-%D1%81-or-1410-b-or-1410-c-or-1410-d-or-1412-b-or-1412-c-or-1412-d/apply/') !== false
    ):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/square2.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
<!-- Контакты заземления -->
    <?//Контакты заземления(Алюминий)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/filter/mount_type-is-%D0%BA%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82%20%D0%B7%D0%B0%D0%B7%D0%B5%D0%BC%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F/work_materials-is-e8fdeaf4b60f01947fbceb4af21ea5a3/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/grounding_contacts_alum.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Контакты заземления(Латунь)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/filter/mount_type-is-%D0%BA%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82%20%D0%B7%D0%B0%D0%B7%D0%B5%D0%BC%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F/work_materials-is-45acdcdd11352791e1e040456ac50e3e/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/grounding_contacts_brass.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Контакты заземления(Медь)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/filter/mount_type-is-%D0%BA%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82%20%D0%B7%D0%B0%D0%B7%D0%B5%D0%BC%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F/work_materials-is-0e689886f0408db1c1bf1ffcf503a578/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/grounding_contacts_copper.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Контакты заземления(Сталь)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh_dlya_kondensatornoy_svarki_cd/filter/mount_type-is-%D0%BA%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82%20%D0%B7%D0%B0%D0%B7%D0%B5%D0%BC%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F/work_materials-is-955bf239d420ce5d5d8c8d7a0343903f/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/grounding_contacts_steel.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
<!-- ARC -->
    <?//UF керамические кольца
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh_dlya_dugovoy_svarki_arc/filter/mount_type-is-%D0%BA%D0%B5%D1%80%D0%B0%D0%BC%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%BE%D0%B5%20%D0%BA%D0%BE%D0%BB%D1%8C%D1%86%D0%BE/type_of_ceramic_ring-is-uf/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/ceramic_uf_rings.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//RF керамические кольца
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh_dlya_dugovoy_svarki_arc/filter/mount_type-is-%D0%BA%D0%B5%D1%80%D0%B0%D0%BC%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%BE%D0%B5%20%D0%BA%D0%BE%D0%BB%D1%8C%D1%86%D0%BE/type_of_ceramic_ring-is-rf/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/ceramic_rf_rings.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//PF керамические кольца
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh_dlya_dugovoy_svarki_arc/filter/mount_type-is-%D0%BA%D0%B5%D1%80%D0%B0%D0%BC%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%BE%D0%B5%20%D0%BA%D0%BE%D0%BB%D1%8C%D1%86%D0%BE/type_of_ceramic_ring-is-pf/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/ceramic_pf_rings.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//MF керамические кольца
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh_dlya_dugovoy_svarki_arc/filter/mount_type-is-%D0%BA%D0%B5%D1%80%D0%B0%D0%BC%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%BE%D0%B5%20%D0%BA%D0%BE%D0%BB%D1%8C%D1%86%D0%BE/type_of_ceramic_ring-is-mf/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/ceramic_mf_rings.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//KSN-F керамические кольца
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh_dlya_dugovoy_svarki_arc/filter/mount_type-is-%D0%BA%D0%B5%D1%80%D0%B0%D0%BC%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%BE%D0%B5%20%D0%BA%D0%BE%D0%BB%D1%8C%D1%86%D0%BE/type_of_ceramic_ring-is-ksn-f/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/ceramic_kns_f_rings.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Резьбовая шпилька ARC RD (сталь)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh_dlya_dugovoy_svarki_arc/filter/mount_type-is-%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D1%88%D0%BF%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0/work_materials-is-2c9430c925a1b635d8f45b2c2db11c78/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_stud_arc_rd_steel.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Резьбовая шпилька ARC RD (нержавеющая сталь)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh_dlya_dugovoy_svarki_arc/filter/work_materials-is-955bf239d420ce5d5d8c8d7a0343903f/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_stud_arc_rd_stainless_steel.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Нерезьбовая шпилька ARC RD (сталь)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh_dlya_dugovoy_svarki_arc/filter/mount_type-is-arc%20%D1%88%D0%BF%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0%20%D0%BF%D1%80%D0%B8%D0%B2%D0%B0%D1%80%D0%BD%D0%B0%D1%8F%20%D0%BD%D0%B5%20%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F/work_materials-is-2c9430c925a1b635d8f45b2c2db11c78-or-uglerodistaya-stal-4-8-or-chyernaya-stal-s235j2-c450/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/not_threaded_stud_arc_rd_steel.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Нерезьбовая шпилька ARC RD (Нержавеющая сталь)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh_dlya_dugovoy_svarki_arc/filter/mount_type-is-arc%20%D1%88%D0%BF%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0%20%D0%BF%D1%80%D0%B8%D0%B2%D0%B0%D1%80%D0%BD%D0%B0%D1%8F%20%D0%BD%D0%B5%20%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F/work_materials-is-955bf239d420ce5d5d8c8d7a0343903f-or-nerzhaveyushchaya-stal-1-4301-or-nerzhaveyushchaya-stal-a2-50/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/not_threaded_stud_arc_rd_stanless_steel.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Резьбовая втулка ARC RD (Сталь)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh_dlya_dugovoy_svarki_arc/filter/mount_type-is-%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D0%B2%D1%82%D1%83%D0%BB%D0%BA%D0%B0/work_materials-is-2c9430c925a1b635d8f45b2c2db11c78/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_bushing_arc_rd_steel.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Резьбовая втулка ARC RD (Нержавеющая сталь)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh_dlya_dugovoy_svarki_arc/filter/mount_type-is-%D1%80%D0%B5%D0%B7%D1%8C%D0%B1%D0%BE%D0%B2%D0%B0%D1%8F%20%D0%B2%D1%82%D1%83%D0%BB%D0%BA%D0%B0/work_materials-is-955bf239d420ce5d5d8c8d7a0343903f-or-nerzhaveyushchaya-stal-1-4301-or-nerzhaveyushchaya-stal-a2-50/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_bushing_arc_rd_stainless_steel.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Угловой соединитель RASM
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/zapressovochnyy_krepyezh/uglovoy-soedinitel/filter/press_fitting_type-is-ras/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/corner_connector_rasm.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Угловой соединитель RAA
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/zapressovochnyy_krepyezh/uglovoy-soedinitel/filter/press_fitting_type-is-raa/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/corner_connector_raa.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Самостоятельное крепление кабельной стяжки TD
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/zapressovochnyy_krepyezh/samostoyatelnoe-kreplenie-kabelnoy-styazhki/filter/work_materials-is-30a861bd618012e284ad21162a05a24c/press_fitting_type-is-td/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/cable_tie_fastening.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Резьбовая шпилька SC под покраску (Омедненная сталь)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh-dlya-korotkogo-tsikla-sc/rezbovaya-shpilka-sc-pod-pokrasku/filter/work_materials-is-0e689886f0408db1c1bf1ffcf503a578/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_stud_SC_for_painting_copper_plated_steel.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Резьбовая шпилька SC тип "Елка" (Омедненная сталь)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh-dlya-korotkogo-tsikla-sc/rezbovaya-shpilka-sc-tip-elka/filter/work_materials-is-0e689886f0408db1c1bf1ffcf503a578/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_stud_SC_christmas_tree_copper_plated_steel.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Резьбовая шпилька SC (Омедненная сталь)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh-dlya-korotkogo-tsikla-sc/rezbovaya-shpilka-sc/filter/work_materials-is-0e689886f0408db1c1bf1ffcf503a578/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_stud_SC_copper_plated_steel.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Резьбовая шпилька SC (Нержавеющая сталь)
    if(stripos($_SERVER['REQUEST_URI'],'/krepezh/privarnoy_krepyezh/krepezh-dlya-korotkogo-tsikla-sc/rezbovaya-shpilka-sc/filter/work_materials-is-955bf239d420ce5d5d8c8d7a0343903f/apply/') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_stud_SC_stainless_steel.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//echo "<pre>";print_r($_SERVER['REQUEST_URI']);?>