<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use yii\web\View;
use yii\helpers\Url;

class NewSmsNotifWidget extends Widget
{
    public $url;
    
    public $interval; // in minutes
    
	public function init()
    {
        parent::init();
        
        $imageUrl = Url::to('@web/img/envelope.png');
        
        $this->view->registerJs("var response = true; function request(){
            if(response == true){
                // This makes it unable to send a new request 
                // unless you get response from last request
                response = false;
                
                var req = \$.ajax({
                    type: 'get',
                    url: '{$this->url}',
                    dataType: 'json'
                });

                req.done(function(data){
                    if (data.count > 0) {
                        \$('#new-sms-count').text(data.count);
                        
                        \$('#new-sms-text').text('Ada ' + data.count + ' pesan baru');
                        
                        \$('#new-sms-list .menu').html('');
                        
                        \$.each(data.items, function(key, value){
                            \$('#new-sms-list .menu').append('<li>' +
                                '<a href=\"#\">' +
                                    '<div class=\"pull-left\">' +
                                        '<img src=\"{$imageUrl}\" class=\"img-circle\" alt=\"user image\">' +
                                    '</div>' +
                                    '<h4>' +
                                        value.SenderNumber +
                                        '<small><i class=\"fa fa-clock-o\"></i> ' + value.ReceivingDateTime + '</small>' +
                                    '</h4>' +
                                    '<p>' + value.TextDecoded + '</p>' +
                                '</a>' +
                            '</li>');
                        });
                    } else {
                        \$('#new-sms-text').text('Tidak ada pesan baru');
                    }
                    
                    // This makes it able to send new request on the next interval
                    response = true;
                });
            }

            setTimeout(request, 1000 * 60 * {$this->interval});
        }

        request();", View::POS_END, 'notif-widget');
    }
    
    public function run()
    {
        $html = '<li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope"></i>
                <span class="label label-success" id="new-sms-count"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="header" id="new-sms-text"></li>
                <li id="new-sms-list">
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu"></ul>
                </li>
                <li class="footer"><a href="'.Url::to(['inbox/index']).'">Lihat Semua</a></li>
            </ul>
        </li>';
        
        return $html;
    }
}
