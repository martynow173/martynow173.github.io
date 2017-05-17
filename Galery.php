<?php
include ('connection.php');
include ('head.php');

?>
<script type="text/javascript" src="galery.js"></script>
       
                <p id="pgal">ГАЛЕРЕЯ</p> 
                
            <div id="slider" name="slider">
                   <img src="images/pic-1.jpg" />
                <div id="leftarrow">
                     <a href='javascript:void(0);' onclick='javascript:back(1);'><img id="larrow" src="images/larrow.png"/></a>
                 </div>
                  <div id="rightarrow"> 
                     <a href='javascript:void(0);' onclick="javascript:forward(1);"><img id="rarrow" src="images/rarrow.png"/></a>
                </div>
                
                   
             </div>
                
                <div id="minlarrow">
                    <a href='javascript:void(0);' onclick='javascript:minback(1);'><img id="larrow" src="images/larrow.png"/></a>
                </div>
                <div id="minrarrow"> 
                    <a href='javascript:void(0);' onclick='javascript:minforward(1);'><img id="rarrow" src="images/rarrow.png"/></a>
                </div>
                <div id="min" name="min">
                    <div class="big">
                        <a href='javascript:void(0);' onclick='javascript:mainpic(1);'><img src="images/pic-1.jpg" /></a>
                    </div>
                    <div class="small">
                        <a href='javascript:void(0);' onclick='javascript:mainpic(2);'><img src="images/pic-2.jpg" /></a>
                    </div>
                    <div class="big">
                        <a href='javascript:void(0);' onclick='javascript:mainpic(3);'><img src="images/pic-3.jpg" /></a>
                    </div>
                    <div class="small">
                        <a href='javascript:void(0);' onclick='javascript:mainpic(4);'><img src="images/pic-4.jpg" /></a>
                    </div>
                    <div class="big">
                        <a href='javascript:void(0);' onclick='javascript:mainpic(5);'><img src="images/pic-5.jpg" /></a>
                    </div>
                    <div class="small">
                        <a href='javascript:void(0);' onclick='javascript:mainpic(6);'><img src="images/pic-6.jpg" /></a>
                    </div>
                    <div class="big">
                        <a href='javascript:void(0);' onclick='javascript:mainpic(7);'><img src="images/pic-7.jpg" /></a>
                    </div>
                </div>
                
            </div>
            <div class="underground">
                <h2 id="underarticle">Авторские права</h2>
				<p>Copyright © 2017. Официальный сайт Мартынова Егора.</p>
				<address>
                Связаться со мной вы всегда можете по e-mail: e.martinow@yandex.ru, 
                либо на сайте vk.com: https://vk.com/martinow111
                </address>
            </div>
        </div>
	</body>
</html>