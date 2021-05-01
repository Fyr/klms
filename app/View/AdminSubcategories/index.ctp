<?
    $title = __('Products');
    $catTitle = Hash::get($parentArticle, 'Category.title');
    $subTitle = $this->ObjectType->getTitle('index', $objectType);
    $breadcrumbs = array(
        $title => 'javascript:;',
        $this->ObjectType->getTitle('index', 'Category') => array('controller' => 'AdminCategories', 'action' => 'index'),
        $catTitle => array('controller' => 'AdminSubcategories', 'action' => 'index', Hash::get($parentArticle, 'Category.id')),
        $subTitle => ''
    );
    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
    echo $this->element('AdminUI/title', compact('title'));
    echo $this->Flash->render();

/*
    $title = $this->ObjectType->getTitle('index', $objectType);
    $breadcrumbs = array(
        __('Collections') => 'javascript:;',
        $this->ObjectType->getTitle('index', 'Category') => array('controller' => 'AdminCategories', 'action' => 'index'),
        Hash::get($parentArticle, 'Category.title') => array('controller' => 'AdminCategories', 'action' => 'edit', Hash::get($parentArticle, 'Category.id')),
        $title => ''
    );
    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
    echo $this->element('AdminUI/title', array('title' => __('Collections')));
    echo $this->Flash->render();
*/
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <?=$this->element('AdminUI/form_title', array('title' => $catTitle.': '.$subTitle))?>
            <div class="portlet-body dataTables_wrapper">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a class="btn green" href="<?=$this->Html->url(array('action' => 'edit', 0, $parent_id))?>">
                                    <i class="fa fa-plus"></i> <?=$this->ObjectType->getTitle('create', $objectType)?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
                <?=$this->PHTableGrid->render($objectType)?>
            </div>
        </div>
    </div>
</div>
