<?php 
use yii\helpers\Html;
use app\components\SettingsHelper;
use yii\helpers\Url;
use yii\web\View;

$spamAjaxUrl = Url::to(['settings/update-spam']);
$settingsAjaxUrl = Url::to(['settings/update-settings']);

$script = <<< SCRIPT
function updateSpam(type)
{
    var data = {};
    
    if (type == 'words') {
        data = {
            update_spam_words: \$('#spam_words').val(),
            _csrf: yii.getCsrfToken()
        };
    } else {
        data = {
            update_spam_numbers: \$('#spam_numbers').val(),
            _csrf: yii.getCsrfToken()
        };
    }
    
    \$.ajax({
        url: "{$spamAjaxUrl}?type=" + type,
        data: data,
        type: 'post',
        dataType: 'html',
        success: function(data){
            alert('spam list updated!');
        }
    });
}

\$('#update_spam_words').click(function(e){
    e.preventDefault();
    updateSpam('words');
});

\$('#update_spam_numbers').click(function(e){
    e.preventDefault();
    updateSpam('numbers');
});

\$('#spam_enabled').change(function(e){
    var data = {
        value: 0,
        _csrf: yii.getCsrfToken()
    };
    
    var success = function(data){ alert('spam filter deactivated'); };
    
    if (\$(this).is(':checked')) {
        data.value = 1;
        success = function(data){ alert('spam filter activated'); };
    }
    
    \$.ajax({
        url: "{$settingsAjaxUrl}?name=spam",
        data: data,
        type: 'post',
        dataType: 'html',
        success: success
    });
});
SCRIPT;

$this->registerJs($script, View::POS_END, 'update-spam');
?>

<?= Html::checkbox('spam_enabled', SettingsHelper::enabled('spam'), ['id' => 'spam_enabled']) ?> <strong>Spam Filter</strong>

<hr />

<h4>Daftar kata-kata spam</h4>

<?= Html::textarea('spam_words', SettingsHelper::getSpamList('words', true), [
    'id' => 'spam_words',
    'rows' => 6,
    'cols' => 150,
]) ?>

<br />
<a href="#" id="update_spam_words" class="btn btn-info">Update Spam Words</a>

<hr />

<h4>Daftar nomor spam</h4>

<?= Html::textarea('spam_numbers', SettingsHelper::getSpamList('numbers', true), [
    'id' => 'spam_numbers',
    'rows' => 6,
    'cols' => 150
]) ?>

<br />
<a href="#" id="update_spam_numbers" class="btn btn-success">Update Spam Numbers</a>