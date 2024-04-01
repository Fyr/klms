<?
    $title = __('Settings');
    $breadcrumbs = array(
        $title => 'javascript:;',
        $this->ObjectType->getTitle('index', $objectType) => ''
    );
    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
    echo $this->element('AdminUI/title', compact('title'));
    echo $this->Flash->render();

    $columns = $this->PHTableGrid->getDefaultColumns($objectType);
    unset($columns['Media.*']);
    unset($columns['Dealer.phone']);
    unset($columns['Dealer.email']);
    array_unshift($columns, array('key' => 'Media.image', 'label' => __('Photo'), 'format' => 'string', 'align' => 'center'));
    $columns['Dealer.region_id'] = array('key' => 'Dealer.region_id', 'label' => __('Region'), 'format' => 'string', 'align' => 'left');
    $columns['Dealer.address']['label'] = __('Contacts');
    $columns['Dealer.url']['label'] = __('URL');

    $rowset = $this->PHTableGrid->getDefaultRowset($objectType);
    foreach($rowset as &$row) {
        $regionID = $row['Dealer']['region_id'];
        $row['Dealer']['region_id'] = $aRegions[$regionID];
        $row['Media']['image'] = $this->Html->image("/img/regions/region{$regionID}.png", array('class' => 'admin-thumb'));

        $row['Dealer']['address'] = implode('<br/>', array(nl2br($row['Dealer']['address']), $row['Dealer']['phone'], $row['Dealer']['email']));
    }
?>
<style>
    .table.dataTable > tbody > tr > td:first-child {
        text-align: center;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <?=$this->element('AdminUI/form_title', array('title' => $this->ObjectType->getTitle('index', $objectType)))?>
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
                <?=$this->PHTableGrid->render($objectType, compact('columns', 'rowset'))?>
            </div>
        </div>
    </div>
</div>
