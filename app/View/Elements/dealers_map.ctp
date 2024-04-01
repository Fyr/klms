<div id="wrap-map">
	<div class="region-map map">
		<div id="map-all" class="map"></div>
		<div class="map-region" style="position: relative; text-align: center; display: none">
			<a class="small-map" href="javascript:;" title="<?=__('Back to global map')?>"><img src="/img/regions/regions_all.png" alt="<?=__('Back to global map')?>" /></a>
			<span style="display: inline-block; position: relative;">
<?
		foreach($aRegions as $id => $region) {
			echo $this->Html->image('/img/regions/region'.$id.'.png', array('id' => 'region'.$id, 'class' => 'region', 'style' => 'display: none'));
			if (isset($aDealers[$id])) {
				foreach($aDealers[$id] as $marker) {
                    $url = $marker['url'] ? $marker['url'] : $this->Html->url(array('controller' => 'pages', 'action' => 'dealer', $marker['id']));
					echo $this->Html->link($this->Html->image('/img/pointer.png'), $url, array(
						'escape' => false,
						'id' => 'marker'.$id,
						'class' => 'marker rm'.$id,
						'title' => $marker['name'],
						'style' => 'display: none; position: absolute; left: '.$marker['marker_x'].'px; top: '.$marker['marker_y'].'px'
					));
				}
			}
		}
?>
			</span>
		</div>
		<div class="map-nav">
			<img class="map" src="/img/blank.gif" alt="<?=__('Global Netherlands map')?>" usemap="#regions_nav" />
			<map name="regions_nav">
<?
		foreach($aRegions as $id => $region) {
            if ($region['area_map']) {
                foreach(explode('|', $region['area_map']) as $coords) {
                    echo $this->Html->tag('area', '', array(
                        'alt' => $region['title'],
                        'title' => $region['title'],
                        'class' => 'r',
                        'data-region' => $id,
                        'shape' => 'poly',
                        'coords' => $coords,
                        'href' => 'javascript:;',
                    ));
                }
            }
			if ($region['marker_x'] && $region['marker_y']) {
				echo $this->Html->link('', 'javascript:;', array(
					'escape' => false,
					'data-region' => $id,
					'class' => 'r region-point',
					'title' => $region['marker_title'],
					'style' => 'left: ' . $region['marker_x'] . 'px; top: ' . $region['marker_y'] . 'px;'
				));
			}
		}
?>
			</map>
		</div>
<?
  foreach($aRegions as $id => $region) {
?>
        <div class="rh rh<?=$id?>" style="display: none; background-image: url('/img/regions/h<?=$id?>.png');"></div>
<?
    }
?>
	</div>
</div>
<style>
@media (max-width: 768px) {
	#wrap-map { margin: 0; display: none; }
}
</style>
<script type="text/javascript">
function calcProp(k, prop) {
	return Math.round(prop.replace(/px/, '') * k) + 'px';
}
function resizeMapWidget(context) {
	var rect = $('#regions-map').get(0).getBoundingClientRect();
	var k = rect.width / 615;
	$('.map, .rh', context).each(function(){
		var props = {
			width: calcProp(k, $(this).css('width')),
			height: calcProp(k, $(this).css('height'))
		};
		$(this).css(props);
	});
	$('.rh, .region-point, .marker', context).each(function(){
		var props = {
			left: calcProp(k, $(this).css('left')),
			top: calcProp(k, $(this).css('top'))
		};
		$(this).css(props);
	});
	$('area', context).each(function(){
		var coords = $(this).attr('coords').split(',');
		for(var i = 0; i < coords.length; i++) {
			coords[i] = Math.round(k * coords[i]);
		}
		$(this).attr('coords', coords.join(','));
	});
	$('img.region', context).each(function(){
		this.width = Math.round(k * this.width);
		this.height = Math.round(k * this.height);
	});
}
$(function(){
	$('#wrap-map area.r').each(function(){
		// $('#wrap-map .region-map').append('<div class="rh rh' + $(this).data('region') + '" />');
	});
	if ($(window).width() > 870) {
		// resizeMapWidget('#wrap-map');
/*
		$('#regions-map').html($('#wrap-map').html());
		$('#wrap-map').html('');
*/
		$('.r').mouseenter(function () {
			$('.rh' + $(this).data('region')).show();
		}).mouseleave(function () {
			$('.rh' + $(this).data('region')).hide();
		}).click(function () {
			console.log('!');
			var regionID = $(this).data('region');
			$('.map-nav').hide();

			$('#map-all').addClass('small-map');

			$('.map-region .region').hide();
			$('.marker').hide();
			$('.map-region #region' + regionID).show();
			$('.rm' + regionID).show();

			setTimeout(function () {
				$('.map-region').fadeIn(500);
			}, 250);
		});
		$('.small-map').click(function () {
			$('.map-region').fadeOut(500);
			$('#map-all').show();
			setTimeout(function () {
				$('#map-all').removeClass('small-map');
				setTimeout(function () {
					$('.map-nav').show();
				}, 500);
			}, 500);
		});
	}
});
</script>