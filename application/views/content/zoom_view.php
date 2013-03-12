<script type="text/javascript" src="<?php echo base_url(); ?>js/extjs/ext-core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/panojs/utils.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/panojs/PanoJS.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/panojs/controls.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/panojs/pyramid_imgcnv.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/panojs/control_thumbnail.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/panojs/control_info.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/panojs/control_svg.js"></script>

<style type="text/css">@import url(<?php echo base_url(); ?>js/styles/panojs.css);</style>

<script type="text/javascript">
// <![CDATA[

PanoJS.MSG_BEYOND_MIN_ZOOM = null;
PanoJS.MSG_BEYOND_MAX_ZOOM = null;
var viewer1 = null;

function createViewer( viewer, dom_id, url, prefix, w, h ) {
    if (viewer) return;
  
    var MY_URL      = url;
    var MY_PREFIX   = prefix;
    var MY_TILESIZE = 256;
    var MY_WIDTH    = w;
    var MY_HEIGHT   = h;
    var myPyramid = new ImgcnvPyramid( MY_WIDTH, MY_HEIGHT, MY_TILESIZE);
    
    var myProvider = new PanoJS.TileUrlProvider('','','');
    myProvider.assembleUrl = function(xIndex, yIndex, zoom) {
        return MY_URL + '/' + MY_PREFIX + myPyramid.tile_filename( zoom, xIndex, yIndex );
    }    
    
    viewer = new PanoJS(dom_id, {
        tileUrlProvider : myProvider,
        tileSize        : myPyramid.tilesize,
        maxZoom         : myPyramid.getMaxLevel(),
        imageWidth      : myPyramid.width,
        imageHeight     : myPyramid.height,
        blankTile       : '../../../js/images/blank.gif',
        loadingTile     : '../../../js/images/progress.gif'
    });

    Ext.EventManager.addListener( window, 'resize', callback(viewer, viewer.resize) );
    viewer.init();
};


function initViewers() {
  createViewer( viewer1, 'viewer', '<?php echo $images_path; ?>', '<?php echo $prefix; ?>', '<?php echo $image_width; ?>',  '<?php echo $image_height; ?>');
}
  
Ext.onReady(initViewers);

// ]]>
</script>

<div style="width: 100%; height: 100%;"> 
      <div id="viewer" class="viewer" style="width: 100%; height: 100%;" ></div>
</div>