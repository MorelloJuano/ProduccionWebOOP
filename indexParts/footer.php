<style type="text/css">
	
.bottom{
	position:fixed;
    bottom:0;
}

#accordion {
    position: fixed;
    bottom: 0;
    width: 100%;
}

.panel-default > .panel-heading{
    background: ##ffffff;
}

.panel-heading {
    padding: 0;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
}

.panel-group .panel {
    border-radius: 0;
}

.panel-title a {
    color: #0000;
    text-align: center;
    width: 100%;
    display: block;
    padding: 0px 5px;
    font-size: 24px;
    font-family: Helvetica,Arial,sans-serif;
    outline: none;
}

.panel-title a:hover,  .panel-title a:active {
    text-decoration: none;
    outline: none;
    -webkit-box-shadow: 6px -27px 70px -12px rgba(255,255,255,1);
    -moz-box-shadow: 6px -27px 70px -12px rgba(255,255,255,1);
    box-shadow: 6px -27px 70px -12px rgba(255,255,255,1);
}



.fondoBlanco{
	color: white; 
}

.sep{
	margin-right: 5px;
}




</style>
<div class="panel-group bottom" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="text-white">
          Integrantes
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body fondoBlanco text-center">
       <span class="mr-5">Juan Morello</span>
       <span class="mr-5">Nicolás Molina</span>
   	   <span class="mr-5">Nicolás Lema</span>
       <span class="mr-5">Lautaro Iborra</span>
       <span class="mr-5">Facundo Saine</span>
      </div>
    </div>
  </div>
</div>


