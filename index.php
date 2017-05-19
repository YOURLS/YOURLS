<?php
require_once( dirname(__FILE__).'/includes/load-yourls.php' );

yourls_html_head();
yourls_html_logo();
?>
	<ul id="admin_menu">
		<li>Go to the <a href="<?php echo yourls_admin_url('index.php') ?>">Admin Interface</a></li>
	</ul>
	<div class="sub_wrap">
	
		<h2>Resolve URL</h2>
		<div>
			<form id="resolve_url_form" action="" method="get">
				<div><strong>Enter Short URL</strong>:<input type="text" id="short-url" name="short-url" value="" class="text" size="8" />
				<input type="button" id="resolve-button" name="resolve-button" value="Resolve" class="button" onclick="resolve();" /></div>
			</form>
		</div>
		
		
	</div>
	
	<div>
		<h2>Add new URL</h2>
		<div>
			<form id="new_url_form" action="" method="get">
				<div><strong>Enter the URL</strong>:<input type="text" id="add-url" name="url" value="" class="text" size="80" />
				Optional: <strong>Custom short URL</strong>:<input type="text" id="add-keyword" name="keyword" value="" class="text" size="8" />
				<input type="button" id="add-button" name="add-button" value="Shorten The URL" class="button" onclick="add_forward();" /></div>
			</form>
		</div>
	</div>
	<script type="text/javascript">
	var base_url = "<?php yourls_site_url() ?>";
	function resolve(){
		var keyword = document.getElementById("short-url").value;
		window.location = base_url+"/"+keyword;
	}
	function add_forward(){
		var keyword = document.getElementById("add-keyword").value;
		var url = document.getElementById("add-url").value;
		window.location = base_url+"/admin/index.php?u="+encodeURIComponent(url)+"&k="+keyword;
	}
	</script>

<?php yourls_html_footer(); ?>
