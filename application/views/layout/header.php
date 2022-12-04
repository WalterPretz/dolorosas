<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link type="text/css" href="<?=$base_url?>/recursos/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="<?=$base_url?>/recursos/fonta/css/all.css" rel="stylesheet">
  <link type="text/css" href="<?=$base_url?>/recursos/fonta/css/solid.css" rel="stylesheet">
  <link rel="icon" href="<?=$base_url?>/recursos/img/w.ico">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/sweetalert2.min.css"/>
  <link type="text/css" rel="stylesheet" href="<?=$base_url?>/recursos/DataTables/datatables.css">

  <script type="text/javascript" src="<?=$base_url?>/recursos/js/jquery-3.6.0.js"></script>
  <script type="text/javascript" src="<?=$base_url?>/recursos/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?=$base_url?>/recursos/js/popper.min.js"></script>
  <script type="text/javascript" src="<?=$base_url?>/recursos/fonta/js/all.js"></script>
  <script type="text/javascript" src="<?=$base_url?>/recursos/fonta/js/solid.js"></script>
  <script type="text/javascript" src="<?=$base_url?>/recursos/js/jquery.numeric.min.js"></script>
  <script type="text/javascript" src="<?=$base_url?>/recursos/js/sweetalert2.all.min.js"></script>
  <script type="text/javascript" src="<?=$base_url?>/recursos/DataTables/datatables.js"></script>

<style type="text/css">
  .botones{
    border-radius: 1.5rem;
    -webkit-box-shadow: 2px 2px 5px #999;
    }

  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .divider {
    height: 3rem;
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

   .footer{
    background-color: #40016E;
  }
  .contorno{
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -0.75rem;
    margin-left: -0.75rem;
  }

  .form-container{
    border: 2px solid #180028;
    padding: 50px 60px;
    border-radius: 25px;
    -webkit-box-shadow: 2px 2px 5px #999;
    -moz-box-shadow: 2px 2px 5px #999;
    background-color: #fff;
}

@media print {
  .oculalimprimir {
    display: none;
  }
}

  .imprimir {
      display: none;
    }
@media print {
  .imprimir {
    display: block;
  }
}

.registro{
  border: 2px solid #570391;
  border-radius: 20px;
  padding: 2rem;
  -webkit-box-shadow: 2px 2px 5px #999;
  -moz-box-shadow: 2px 2px 5px #999;
  margin: 15px;
}

.registrofren{
  border: 2px solid #570391;
  border-radius: 10px;
  padding: 0.5rem;
  -webkit-box-shadow: 2px 2px 5px #999;
  -moz-box-shadow: 2px 2px 5px #999;
  margin: 5px;
}
.colcarga{
  color: #0004BB;
}
.hrcolor{
  color: #FF0000;
  border: 1px solid #FF0000;
}

.negro{
  color: #0F0689;
  font-weight: bold;
}

.morado{
  color: #40016E;
  font-weight: bold;
  margin-top: 10px;
}
/*video responsivo pa*/
.video-responsive {
position: relative;
padding-bottom: 56.25%; /* 16/9 ratio */
padding-top: 30px; /* IE6 workaround*/
height: 0;
overflow: hidden;
}

.video-responsive iframe,
.video-responsive object,
.video-responsive embed {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
}

/*form-*/
.formestilo{
  padding: 1rem;
  border-radius: 10px;
  border: 2px solid;
  border-color: blue;

  -webkit-box-shadow: 2px 2px 5px #999;
  -moz-box-shadow: 2px 2px 5px #999;
}

.divespa{
  padding-top: 1.5rem;
}

/*para los divs*/

.ford {
  display: block;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  border: #fff;
  color: #495057;
  border-color: #fff;
  background-color: #fff;
  border-bottom:  solid 2px blue;

}

/*imprimir*/
@media print{
  .ford{
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    border: #fff;
    color: #495057;
    border-color: #fff;
    background-color: #fff;
    border-bottom:  solid 2px blue;
  }
}

@media (prefers-reduced-motion: reduce) {
  .ford {
    transition: none;
  }
}

.ford::-ms-expand {
  background-color: transparent;

}

.ford:-moz-focusring {
  color: transparent;
  text-shadow: 0 0 0 #495057;
}

.ford:focus {
  color: #000;
  background-color: #FEFFF7;
  border-bottom: solid red; 
  outline: 0;
}

.ford::-webkit-input-placeholder {
  color: #6c757d;
  opacity: 1;
}

.ford::-moz-placeholder {
  color: #6c757d;
  opacity: 1;
}

.ford:-ms-input-placeholder {
  color: #6c757d;
  opacity: 1;
}

.ford::-ms-input-placeholder {
  color: #6c757d;
  opacity: 1;
}

.ford::placeholder {
  color: #6c757d;
  opacity: 1;
}


input[type="date"].ford,
input[type="time"].ford,
input[type="datetime-local"].ford,
input[type="month"].ford {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

select.ford:focus::-ms-value {
  color: #495057;
  background-color: #fff;
}
.margeninferior{
  margin-bottom: -5px;
}
.espa{
  margin-top: -12px;
  font-weight: bold;
}
.arr{
  margin-top: 15px;
}
/*estilo reci*/
.recibo{
  border: double 6px;
  border-color: #000;
  border-radius: 15px;
}
.contornoper{
  padding: 10px;
  border: 1em solid transparent;
  width: 100%;
  background-image: url("<?=$base_url?>/recursos/img/flores.png");
}

.caja{
  margin: 2em;
}
.letra {
  color: #000;
}

.forma{
  border: solid 2px;
  border-radius: 5px;
  padding-top: 2px;
}
.centra{
  margin-bottom: 5px;
  margin-top: 4px;
  margin-left: 5px;
}
.raya{
  border-left: solid 2px;
}

.fondoImp{

margin:0 auto;
padding:0px;
background: url("<?=$base_url?>/recursos/img/logo1.png") no-repeat center center;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
-ms-background-size: cover;
background-size: 300px;
}

.neg{
  color: #000;
}

.paginador{
  padding: 15px;
  list-style: none;
  background: #fff;
  font-weight: bold;
  margin-top: 15px;
  display: -webkit-flex;
  display: -moz-flex;
  display: -ms-flex;
  display: -o-flex;
  display: flex;
  justify-content: center;
}
.est, .seleccion{
  color: #3D007B;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 5px;
  display: inline-block;
  font-size: 14px;
  text-align: center;
  width: 35px;
}

.est:hover{
  background:  #2E007A;
  color: #fff;
  font-weight: bold;
}

.seleccion{
  color: #fff;
  background: #2E007A;
  border: 1px solid #2E007A;
}

/*salto*/
@media print{
      .saltoDePagina{
        display:block;
        page-break-before:always;
    }
  }
.blancof{
  margin:0 auto;
  padding:0px;
  background-color: #FFFFFF;
}

.blancor{
  background-color: #FFFFFF;
}

.adorno{
  margin: 0 auto;
  padding-top: 25px;
  padding-left: 30px;
  padding-right: 30px;
  padding-bottom: 25px;
  background: url("<?=$base_url?>/recursos/img/flores.png") no-repeat center center;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  -ms-background-size: cover;
  background-size: 100%;
}

.escudo{
  margin:0 auto;
  padding:0px;
  background: url("<?=$base_url?>/recursos/img/logo1.png") no-repeat center center;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  -ms-background-size: cover;
  background-size: 300px;
}
.grueso{
  margin: 15px;
}

.registro1{
  border: 5px double #210038;
  border-radius: 20px;
  -webkit-box-shadow: 2px 2px 5px #999;
  -moz-box-shadow: 2px 2px 5px #999;
}

.contenidoCargadora{
  display: flex;
  flex-direction: center;
  align-items:center;
  text-align:center;
  align-self:center;
  align-content: center;
  justify-content:center;
}
.contenidoCargadora .row1{
  display:flex;
}
.contenidoCargadora img{
  display: flex;
  align-self: center;
  flex-direction: center;
  align-items:center;
  text-align:center;
  align-content: center;
  justify-content:center;
}

.contenidoCargadora .turno{
  display:flex;
  align-content: center;
  align-items: center;
  margin-right: 10px;
}
</style>
