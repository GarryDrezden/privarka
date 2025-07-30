<section>
    <style>
        /*Таблицы типоразмеров*/
        .metrix_tables{
            padding: 10px 0 25px 0;
        }
        .metrix_tables details{
            font-size: 16px;
        }
        .metrix_tables summary{
            padding: 10px;
            font-size: 16px;
        }
        .metrix_tables table{
            width: 100%;
            text-align: center;
        }
        .metrix_tables h2{
            padding: 25px 0 10px 0;
        }
    </style>
    <div class="product-item-detail-properties">
        <div class="metrix_tables">
        <?Global $APPLICATION;
        //Втулка алюминиевая
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_rezbovaya_privarnaya_alyuminievaya') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/aluminum_bushing.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Омедненная втулка
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_rezbovaya_privarnaya_stal_omednennaya') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/copper_plated_bushing.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Нержавеющая втулка
        if(stripos($_SERVER['REQUEST_URI'],'vtulka_rezbovaya_privarnaya_nerzhaveyushchaya_stal') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/stainless_steel_bushing.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Резьбовая шпилька под покраску (омедненная)
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_rezbovaya_stal_omednennaya') !== false && 
        stripos($_SERVER['REQUEST_URI'],'s_ochistkoy_ot_kraski') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_rod_copper_plated_for_painting.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Резьбовая шпилька (омедненная)
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_rezbovaya_stal_omednennaya') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_rod_copper_plated.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Резьбовая шпилька (нержавеющая сталь)
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_rezbovaya_nerzhaveyushchaya_stal') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_rod_stainless_steel.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Резьбовая шпилька (алюминий)
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_rezbovaya_alyuminiy') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_rod_aluminum.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Резьбовая шпилька латунная
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_rezbovaya_latun') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_rod_brass.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Нерезьбовая шпилька (омедненная)
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_nerezbovaya_stalnaya_omednenaya') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/non_threaded_rod_copper_plated.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Нерезьбовая шпилька (нержавеющая сталь)
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_nerezbovaya_nerzh_stal') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/non_threaded_rod_stainless_steel.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Нерезьбовая шпилька алюминиевая
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_nerezbovaya_alyuminievaya') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/non_threaded_rod_aluminum.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Нерезьбовая шпилька (латунь)
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_nerezbovaya_latunnaya') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/non_threaded_rod_brass.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гибкие упоры черная сталь
        if(stripos($_SERVER['REQUEST_URI'],'gibkiy_upor') !== false && 
        stripos($_SERVER['REQUEST_URI'],'s235j2') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/flexible_stops_black_steel.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
<!-- Шпилька запрессовочная резьбовая -->
        <?//Шпилька запрессовочная резьбовая TFH
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'tfh_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-TFH.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая CFHA
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'cfha_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-CFHA.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая CFHC
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'cfhc_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-CFHC.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая CHA
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'cha_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-CHA.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая CHC
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'chc_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-CHC.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая HFHS
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'hfhs_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-HFHS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая HFH
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'hfh_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-HFH.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая FH4
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'fh4_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-FH4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая FHA
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'fha_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-FHA.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая FHL
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'fhl_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-FHL.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая FHLS
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'fhls_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-FHLS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая FHS
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'fhs_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-FHS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая HFE
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'hfe_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-HFE.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая KFH
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'kfh_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-KFH.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая FH
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'/fh_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-FH.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая TFH
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'tfh_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-TFH.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная резьбовая TFHS
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_zapressovochnaya_rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'tfhs_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press-fit-threaded-stud-TFHS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька «Рождественская елка»
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_elka') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/welded_stud_Christmas_tree.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
<!-- Шпилька запрессовочная без резьбы -->
        <?//Шпилька запрессовочная без резьбы TP4
        if(stripos($_SERVER['REQUEST_URI'],'shpilka-zapressovochnaya-bez-rezby') !== false &&
        stripos($_SERVER['REQUEST_URI'],'tp4_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_non_threaded_studs_TP4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная без резьбы TPS
        if(stripos($_SERVER['REQUEST_URI'],'shpilka-zapressovochnaya-bez-rezby') !== false &&
        stripos($_SERVER['REQUEST_URI'],'tps_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_non_threaded_studs_TPS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Шпилька запрессовочная без резьбы TP
        if(stripos($_SERVER['REQUEST_URI'],'shpilka-zapressovochnaya-bez-rezby') !== false &&
        stripos($_SERVER['REQUEST_URI'],'tp_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_non_threaded_studs_TP.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
<!-- Гайка запрессовочная резьбовая -->
        <?//Гайка запрессовочная резьбовая AC
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'ac_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_AC.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая AS
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'/as_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_AS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая B
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'/b_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_B.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая BS
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'/bs_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_BS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая CFN
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'cfn_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_CFN.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая CLA
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'cla_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_CLA.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая CLS
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'cls_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_CLS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая F
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'/f_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_F.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая H
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'/h_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_H.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая F4
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'/f4_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_F4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая k_series
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'k_series_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_k_series.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая KF2
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'kf2_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_KF2.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая KFS2
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'kfs2_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_KFS2.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая LAC
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'lac_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_LAC.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая LAS
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'las_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_LAS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая PL
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'pl_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_PL.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая PLC
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'plc_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_PLC.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая S
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'/s_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_S.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая SL
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'/sl_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_SL.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая SMPS
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'/smps_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_SMPS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Гайка запрессовочная резьбовая SP4
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') !== false &&
        stripos($_SERVER['REQUEST_URI'],'/sp4_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/pressing_nuts_SP4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
<!-- Втулка запрессовочная -->
        <?//Втулка запрессовочная BSO
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/bso_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_BSO.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная BSO4
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/bso4_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_BSO4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная BSOA
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/bsoa_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_BSOA.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная BSOS
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/bsos_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_BSOS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная CSOS_2_4
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/csos_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_CSOS_2_4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная CSS_16
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/css_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_CSS_16.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная DSO
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/dso_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_DSO.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная DSOS
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/dsos_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_DSOS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная KFE_3_4
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/kfe_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_KFE_3_4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная KFE_36_42
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/kfe_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_KFE_36_42.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная KFSE_3_4
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/kfse_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_KFSE_3_4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная KFSE_36_42
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/kfse_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_KFSE_36_42.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная MSO4
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/mso4_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_MSO4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SKC
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/skc_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SKC.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SO
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/so_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SO.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SO4
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/so4_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SO4.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SOA
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/soa_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SOA.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SOAG
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/soag_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SOAG.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SOS
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/sos_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SOS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SOSG
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/sosg_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SOSG.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SSA
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/ssa_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SSA.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SSC
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/ssc_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SSC.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная SSS
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/sss_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_SSS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная TSO
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/tso_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_TSO.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Втулка запрессовочная TSOS
        if(stripos($_SERVER['REQUEST_URI'],'gayka-zapressovochnaya-rezbovaya') == false 
        && stripos($_SERVER['REQUEST_URI'],'vtulka_zapressovochnaya') !== false
        && stripos($_SERVER['REQUEST_URI'],'/tsos_') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fit_bushings_TSOS.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
<!-- Винт невыпадающий -->
    <?//Винт невыпадающий PF11
    if(stripos($_SERVER['REQUEST_URI'],'vint_nevypadayushchiy') == !false
    && stripos($_SERVER['REQUEST_URI'],'/pf11') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PF11.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PF31
    if(stripos($_SERVER['REQUEST_URI'],'vint_nevypadayushchiy') == !false
    && stripos($_SERVER['REQUEST_URI'],'/pf31') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PF31.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PF32
    if(stripos($_SERVER['REQUEST_URI'],'vint_nevypadayushchiy') == !false
    && stripos($_SERVER['REQUEST_URI'],'/pf32') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PF31.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PF50
    if(stripos($_SERVER['REQUEST_URI'],'vint_nevypadayushchiy') == !false
    && stripos($_SERVER['REQUEST_URI'],'/pf50') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PF50.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PFC2
    if(stripos($_SERVER['REQUEST_URI'],'vint_nevypadayushchiy') == !false
    && stripos($_SERVER['REQUEST_URI'],'/pfc2') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PFC2.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PFC2P
    if(stripos($_SERVER['REQUEST_URI'],'vint_nevypadayushchiy') == !false
    && stripos($_SERVER['REQUEST_URI'],'/pfc2p') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PFC2P.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PFHV
    if(stripos($_SERVER['REQUEST_URI'],'vint_nevypadayushchiy') == !false
    && stripos($_SERVER['REQUEST_URI'],'/pfhv') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PFHV.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PFS2
    if(stripos($_SERVER['REQUEST_URI'],'vint_nevypadayushchiy') == !false
    && stripos($_SERVER['REQUEST_URI'],'/pfs2') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PFS2.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Винт невыпадающий PTL2
    if(stripos($_SERVER['REQUEST_URI'],'vint_nevypadayushchiy') == !false
    && stripos($_SERVER['REQUEST_URI'],'/ptl2') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/captive_screws_PTL2.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
<!-- Запрессовочные аксессуары -->
    <?//Гайка развальцовочная RMHB
    if(stripos($_SERVER['REQUEST_URI'],'gayka_razvaltsovochnaya') !== false &&
    stripos($_SERVER['REQUEST_URI'],'rmhb') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fitting_accessories_RMHB_GS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка развальцовочная RMHB
    if(stripos($_SERVER['REQUEST_URI'],'gayka_razvaltsovochnaya') !== false &&
    stripos($_SERVER['REQUEST_URI'],'rmhb') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fitting_accessories_RMHB_GZ.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка развальцовочная RHB
    if(stripos($_SERVER['REQUEST_URI'],'gayka_razvaltsovochnaya') !== false &&
    stripos($_SERVER['REQUEST_URI'],'rhb') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fitting_accessories_RHB_GS.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Гайка развальцовочная RMHB
    if(stripos($_SERVER['REQUEST_URI'],'gayka_razvaltsovochnaya') !== false &&
    stripos($_SERVER['REQUEST_URI'],'rhb') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fitting_accessories_RHB_GZ.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <?//Колпачки
    if(stripos($_SERVER['REQUEST_URI'],'silikonovyy_kolpachok') !== false):
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/press_fitting_accessories_SMC2.php"), 
        Array(), 
        Array("MODE"=>"php")
    );
    endif;?>
    <!-- Болт заземления -->
        <?//Болт заземления CD (омедненные)
        if(stripos($_SERVER['REQUEST_URI'],'11_06_016_fl_11_5_shpilka_rezbovaya_stalnaya_omednennaya_cd') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/ground_bolt_cd_copper_plated.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Болт заземления CD (нержавейка)
        if(stripos($_SERVER['REQUEST_URI'],'shpilka_rezbovaya_stalnaya') !== false && 
        stripos($_SERVER['REQUEST_URI'],'bolt_zazeml') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/ground_bolt_cd_steel.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Болт заземления ARC (никель)
        if(stripos($_SERVER['REQUEST_URI'],'bolt_zazemleniya_s_plastikovym_kolpachkom_stal_nikelirovannaya')):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/ground_bolt_arc_nickel.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Болт заземления ARC (омедненные)
        if(stripos($_SERVER['REQUEST_URI'],'bolt_zazemleniya_s_plastikovym_kolpachkom_stal_omednennaya') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/ground_bolt_arc_cooper.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Резьбовая шпилька SC под покраску (Омедненная сталь)
        if(stripos($_SERVER['REQUEST_URI'],'rezbovaya-shpilka-sc-pod-pokrasku') !== false &&
        stripos($_SERVER['REQUEST_URI'],'omednennaya') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_stud_SC_for_painting_copper_plated_steel.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Резьбовая шпилька SC тип "Елка" (Омедненная сталь)
        if(stripos($_SERVER['REQUEST_URI'],'rezbovaya-shpilka-sc-tip-elka') !== false &&
        stripos($_SERVER['REQUEST_URI'],'omednennaya') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_stud_SC_christmas_tree_copper_plated_steel.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Резьбовая шпилька SC (Омедненная сталь)
        if(stripos($_SERVER['REQUEST_URI'],'rezbovaya-shpilka-sc/') !== false &&
        stripos($_SERVER['REQUEST_URI'],'omednenaya') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_stud_SC_copper_plated_steel.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>
        <?//Резьбовая шпилька SC (Нержавеющая сталь)
        if(stripos($_SERVER['REQUEST_URI'],'rezbovaya-shpilka-sc/') !== false &&
        stripos($_SERVER['REQUEST_URI'],'nerzhaveyushchaya') !== false):
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("/local/templates/privarka2023/includes/threaded_stud_SC_stainless_steel.php"), 
            Array(), 
            Array("MODE"=>"php")
        );
        endif;?>

        <?php
        foreach ($arResult['PROPERTIES'] as $property){
            if ($property['CODE'] == "NOMENCLATURE"){
                ?>
                <div class="detail_property_blocks">
                    <div class="detail_property_block3">
                        <?
                        foreach($property['VALUE'] as $img_path){
                            $URL = CFile::GetPath($img_path);
                        ?>
                        <img src="<?=$URL?>">
                        <?}?>
                    </div>
                </div>
                <?php
            }
        }
        unset($property);
        ?>
        <div class="detail_property_blocks">
            <div class="detail_property_block3">
                <?if ($property['CODE'] == "NOMENCLATURE"){
                    for ($i = 0; $i <= count($arResult['PROPERTIES']['NOMENCLATURE_FILES_NAME']['VALUE'])-1; $i++){
                        $URL = CFile::GetPath($arResult['PROPERTIES']['NOMENCLATURE_FILES']['VALUE'][$i]);
                ?>
                <div class="detail_property_files_block">
                    <a href="<?=$URL?>" download>
                        <img src="/upload/icons/pdf.png" style="width: 80px;"/>
                        
                    </a>
                    <p><?=$arResult['PROPERTIES']['NOMENCLATURE_FILES_NAME']['VALUE'][$i]?></p>
                </div>
                <?}}?>
                
            </div>
        </div>
    </div>
    </div>
</section>