<?php 
namespace Application\Block\OptionsDisplayer;
defined("C5_EXECUTE") or die("Access Denied.");
use Concrete\Core\Block\BlockController;
use Core;
use Loader;
use Page;

class Controller extends BlockController
{
    public $helpers = array (
  0 => 'form',
);

    protected $btExportFileColumns = array (
);
    protected $btTable = 'btOptionsDisplayer';
    protected $btInterfaceWidth = 400;
    protected $btInterfaceHeight = 500;
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btCacheBlockOutputLifetime = 0;
    
    public function getBlockTypeDescription()
    {
        return t("");
    }

    public function getBlockTypeName()
    {
        return t("Options displayer");
    }

    public function getSearchableContent()
    {
        $content = array();
        $content[] = $this->optionclass;
        return implode(" ", $content);
    }

    public function add()
    {
    }

    public function edit()
    {
    }

    public function save($args)
    {
        $db = \Database::get();
        $args['optionclass'] = htmlentities($args['optionclass']);
        parent::save($args);
    }

    
    function renderOptions($options) {
        echo '<div class="mcl-options-wrapper">';

        foreach($options as $option) {
            @$this->renderOption($option);      
        }

        echo '</div>';
    }
    
    function renderOption($option){
        if (method_exists($this, $option['type'])) :
            $this->$option['type']($option);
        else :
        echo '<div class="option" id="' . $option['id'] . '">';
            echo '<h5 class="option-name"><i class="fa fa-cog"></i> ' . $option['name'] . '</h5>';
            echo    '<p class="option-meta">
                    <small><i class="fa fa-sliders"></i> ' . t('type : ') 
                    . '<span class="code">' . $option['type'] . '</span>';
                    
            if(isset($option['default'])) :
                switch ($option['type']) {
                    case 'select':
                        $default =  '<span class="code">' . $option['options'][$option['default']] . '</span>';
                        break;
                    case 'toggle':
                        $default =  '<span class="code">' . ($option['default'] ? t('On') : t('Off')) . '</span>';
                        break;                    
                    case 'range':
                        $default =  '<span class="code">' . $option['default'] . '' . $option['unit']  . '</span>';
                        break;                    
                    case 'awesome':
                        $default = "<i class=\"fa {$option['default']}\"></i>";
                        break;                    
                    default:
                        $default = '<span class="code">' . $option['default'] . '</span>';
                        break;
                }
                echo '&nbsp;&nbsp;' . '<i class="fa fa-file-o"></i> ' . t('  default : ') . $default 
                        . '&nbsp;&nbsp;' . t('id : ') . '<span class="code">' . $option['id'] . '</span>';
            endif;
            echo '</small></p>';
            if(isset($option['desc']))echo '<p class="description">' . $option['desc'] . '</p>';
            echo '<hr>';
        echo '</div>';
        endif;
    }


    /* -- All element that doesn't need to be wrapped in HTML -- */
    /**
     * prints the options page title
     */

    function section ($item) {
        echo '<h3><i class="fa ' . $item['icon'] . '"></i> ' . $item['name'] . '</h3>';
        if (isset($item['desc'])) echo '<p>' . $item['desc'] . '</p>';
        
    }   
    function subsection ($item) {
        echo '<div class="subsection">
                <h4>' . $item['name'] . '
                <small>' . $item['desc'] . '</small>
                </h4>
            </div>';
    }
    function submit ($item) {
    }
    function custom ($item) {
        $item['type'] = $item['function'];
        $this->renderOption($item);
    }   
}