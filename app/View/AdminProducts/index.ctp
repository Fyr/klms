<?
    $title = __('Catalog');
    $breadcrumbs = array(
        $title => 'javascript:;',
        $this->ObjectType->getTitle('index', $objectType) => ''
    );

    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
    echo $this->element('AdminUI/title', compact('title'));
    echo $this->Flash->render();

    $columns = $this->PHTableGrid->getDefaultColumns($objectType);
    // unset($columns['Product.cat_id']);
    // unset($columns['Product.subcat_id']);
    // $columns['Product.featured']['label'] = __('For home page');
    // array_unshift($columns, array('key' => 'Product.photo', 'label' => __('Photo'), 'format' => 'string'));

    $rowset = $this->PHTableGrid->getDefaultRowset($objectType);
    // $aSubcategories = Hash::combine($aSubcategories, '{n}.Subcategory.id', '{n}.Subcategory.title');
/*
    foreach($rowset as &$row) {
        $src = $this->Media->imageUrl($row, '100x');
        $row['Product']['photo'] = ($src) ? $this->Html->image($src) : '';
        if ($title = Hash::get($filter, 'title')) {
            $row['Product']['title'] = $this->Text->highlight($row['Product']['title'], $title, array('format' => '<span class="label label-info">\1</span>'));
        }
        $row['Product']['title'] = sprintf("<small>%s &gt; %s</small><br />%s<br /><small>",
            $aCategories[$row['Product']['cat_id']],
            $aSubcategories[$row['Product']['subcat_id']],
            $row['Product']['title']
        );
    }

    $row_actions = '../AdminProducts/_row_actions';
    $limitOptions = array(10 => '10', 20 => '20', 50 => '50');
*/
?>
<style>
    .table.dataTable > tbody > tr > td:first-child {
        text-align: center;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <?=$this->element('AdminUI/form_title', array('title' => $title))?>
            <div class="portlet-body dataTables_wrapper">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <a class="btn green" href="<?=$this->Html->url(array('action' => 'edit', 0))?>">
                                    <i class="fa fa-plus"></i> <?=$this->ObjectType->getTitle('create', $objectType)?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?=$this->PHTableGrid->render($objectType, compact('rowset', 'columns', 'row_actions'))?>
            </div>
        </div>
    </div>
</div>
