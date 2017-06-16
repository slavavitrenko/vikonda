<?php

function registerAlert($type='success', $message=''){
    Yii::$app->view->registerJs(<<< JS
            $.notify({
            icon: 'ti-info-alt',
            message: '$message'
            },{
            type: '$type',
            element: 'body',
            position: null,
            allow_dismiss: true,
            allow_duplicates: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
            from: "top",
            align: "center"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 1000,
            timer: 5000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
            },
            icon_type: 'class'
            });
JS
    );
}

foreach (Yii::$app->session->getAllFlashes() as $type => $message):
    if(is_array($message)){
        foreach($message as $m){
            registerAlert($type, $m);
        }
    }
    else{
        registerAlert($type, $message);
    }
    registerAlert($type, $message);
endforeach;