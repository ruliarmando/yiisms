<?php

namespace app\components;

use Yii;
use yii\widgets\Menu;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;


class SidebarWidget extends Menu
{
	public $options = ['class' => 'sidebar-menu'];
    
    public $linkTemplate = '<a href="{url}"> <i class="{icon}"></i> <span>{label}</span></a>';
    
    public $submenuTemplate = "\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n";
    
    public $activateParents = true;
    
    /**
     * Renders the content of a menu item.
     * Note that the container and the sub-menus are not rendered here.
     * @param array $item the menu item to be rendered. Please refer to [[items]] to see what data might be in the item.
     * @return string the rendering result
     */
    protected function renderItem($item)
    {
        if (isset($item['submenu'])) {
            $template = '<a href="{url}"> <i class="{icon}"></i> <span>{label}</span>
                <i class="fa fa-angle-left pull-right"></i></a>';
                
            return strtr($template, [
                '{url}' => Url::to($item['url']),
                '{label}' => $item['label'],
                '{icon}' => $item['icon'],
            ]);
        }
        
        if (isset($item['url'])) {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);

            return strtr($template, [
                '{url}' => Url::to($item['url']),
                '{label}' => $item['label'],
                '{icon}' => $item['icon'],
            ]);
        } else {
            $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);

            return strtr($template, [
                '{label}' => $item['label'],
                '{icon}' => $item['icon'],
            ]);
        }
    }
}
