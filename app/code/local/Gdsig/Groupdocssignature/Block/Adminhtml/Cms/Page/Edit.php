<script>
    // Insert GroupDocs File ID at cms edit page
    function gdfileid(){
        var anchor = document.getElementsByTagName("a");
        // Switch the right tab
        for (var i = 0; i < anchor.length; i++){   
            if (anchor[i].className.match(/tab-item-link/) || anchor[i].className.match(/tab-item-link active/)){
                if (anchor[i].title!="Content"){
                    anchor[i].className ="tab-item-link";
                    var tab1 = document.getElementById('page_tabs_main_section_content');
                    var tab3 = document.getElementById('page_tabs_design_section_content');
                    var tab4 = document.getElementById('page_tabs_meta_section_content');
                    tab1.style.display = 'none';
                    tab3.style.display = 'none';
                    tab4.style.display = 'none';
                } else {
                    anchor[i].className ="tab-item-link active";
                    var tab2 = document.getElementById('page_tabs_content_section_content');
                    tab2.style.display = 'block';
                }
            }
        }
        // Enter GroupDocs File ID
        var ans=prompt('Enter GroupDocs Form ID:','');
        if(ans.length<30) { alert('Sorry, but this Form ID is too short'); return false; }
        if(ans.length>70) { alert('Sorry, but this Form ID is too big'); return false; }
        // all good continue
        var cmsName = 'Magento'
        var cmsVersion = '1.7'
        var iframe = '<iframe src="https://apps.groupdocs.com/signature/forms/SignEmbed/'+ans+'?&referer='+cmsName+'/'+cmsVersion+'" frameborder="0" width="600" height="400"></iframe>';
        var tinyMceContent = tinyMCE.activeEditor.getContent();
        // set content
        tinyMCE.activeEditor.setContent(tinyMceContent+iframe);
        

    }
</script>
<?php
class Gdsig_Groupdocssignature_Block_Adminhtml_Cms_Page_Edit extends Mage_Adminhtml_Block_Cms_Page_Edit {
    public function  __construct() {

        parent::__construct();

        $this->_addButton('button_id', array(
            'label'     => Mage::helper('cms')->__('GroupDocs Signature File ID'),
            'onclick'   => 'gdfileid()',
            'class'     => 'go'
        ), 0, 100, 'footer', 'header');
    }
}
