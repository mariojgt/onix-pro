{{-- need for the editor layout --}}
<link href="{{ asset('vendor/Onix/css/app.css') }}" rel="stylesheet">
{{-- need for the editor basic plugins --}}
<link href="{{ asset('vendor/Onix/grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.css') }}" rel="stylesheet">

<style>
.gjs-one-bg {
  background-color: {{ $mainBackgroudColor ?? '#000000'}};
}

/* Secondary color for the text color */
.gjs-two-color {
  color: {{ $textColor ?? '#ffffff' }};
}
/* css need for the floating icon */
*{padding:0;margin:0;}
.label-container{
	position:fixed;
	bottom:48px;
	right:105px;
	display:table;
    visibility: hidden;
    z-index: 999999999999999;
}
.label-text{
	color:#FFF;
	background:rgba(51,51,51,0.5);
	display:table-cell;
	vertical-align:middle;
	padding:10px;
    border-radius:3px;
    z-index: 999999999999999;
}
.label-arrow{
	display:table-cell;
	vertical-align:middle;
	color:#333;
    opacity:0.5;
    z-index: 999999999999999;
}
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	color:#FFF;
	border-radius:50px;
	text-align:center;
    box-shadow: 2px 2px 3px #999;
    z-index: 999999999999999;
	background-color:{{ $mainBackgroudColor ?? '#000000' }};
}
.my-float{
	font-size:24px;
	margin-top:18px;
}
a.float + div.label-container {
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.5s ease;
}
a.float:hover + div.label-container{
  visibility: visible;
  opacity: 1;
}
.editor-bar-hide {
    /* top: 96%;
	right: 85%; */
	right: 0%;
	position: fixed;
}
.move-box {
    right: 20%;
	position: fixed;
}

/* -----
SVG Icons - svgicons.sparkk.fr
----- */

.svg-icon {
  width: 1em;
  height: 1em;
}

.svg-icon path,
.svg-icon polygon,
.svg-icon rect {
  fill: #fff;
}

.svg-icon circle {
  stroke: #fff;
  stroke-width: 1;
}

/*  end css need for the floating icon */
</style>
