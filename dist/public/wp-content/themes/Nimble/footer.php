	<footer id="main-footer">
	<?php get_sidebar( 'footer' ); ?>
	
		<div id="footer-bottom">
			<div class="container">
				<p id="copyright">Copyright &copy; <?php echo date('Y'); ?> <?php echo esc_attr( get_bloginfo( 'name' ) ); ?>. All Rights Reserved.</p>
			</div> <!-- end .container -->
		</div> <!-- end #footer-bottom -->
	</footer> <!-- end #main-footer -->
<?php wp_footer(); ?>
</body>
</html>