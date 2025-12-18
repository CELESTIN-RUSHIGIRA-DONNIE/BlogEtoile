
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="Mailto:celestinrushigiradonnie@gmail.com" target="_blank">Donnie Rushigira</a> 2025</p>
            </div>
        </div>
        

        
    </div>

    <script src="assets/vendor/global/global.min.js"></script>
	<script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/js/dlabnav-init.js"></script>

    <!-- Chart ChartJS plugin files -->
    <script src="assets/vendor/chart.js/Chart.bundle.min.js"></script>
    
	<!-- Toastr -->
    <script src="assets/vendor/toastr/js/toastr.min.js"></script>
    <script src="assets/js/plugins-init/toastr-init.js"></script>
    <script>
        <?php if (!empty($toast)): ?>
            toastr.<?php echo $toast['type']; ?>("<?php echo addslashes($toast['message']); ?>");
        <?php endif; ?>
    </script>

	<!-- Chartist -->
    <script src="assets/vendor/chartist/js/chartist.min.js"></script>
    <script src="assets/vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    
	<!-- Flot -->
    <script src="assets/vendor/flot/jquery.flot.js"></script>
    <script src="assets/vendor/flot/jquery.flot.pie.js"></script>
    <script src="assets/vendor/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendor/flot-spline/jquery.flot.spline.min.js"></script>
	
	<!-- Chart sparkline plugin files -->
    <script src="assets/vendor/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="assets/js/plugins-init/sparkline-init.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="assets/vendor/peity/jquery.peity.min.js"></script>
	<script src="assets/js/plugins-init/piety-init.js"></script>
	
    <!-- Init file -->
    <script src="assets/js/plugins-init/widgets-script-init.js"></script>

	<!-- Svganimation scripts -->
    <script src="assets/vendor/svganimation/vivus.min.js"></script>
    <script src="assets/vendor/svganimation/svg.animation.js"></script>
    <script src="assets/js/styleSwitcher.js"></script>
	
	
</body>
</html>
