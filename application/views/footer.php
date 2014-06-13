</div>

<footer>
    <div class="container">
        <div class="minimenu">
            <a href="#">Tentang</a> | 
            <a href="#">Privasi</a> | 
            <a href="#">Kuki</a> | 
        <?php if (isLogin()) { 
        	echo '<a href="' . base_url() . 'facebook/logout" title="Logout dari Aplikasi dan Facebook">Logout</a>';
        }?>

        </div>
    </div>
</footer>
</div> <!-- mainwrappaer !-->
<div id="fb-root"></div>
</body>    
</html>