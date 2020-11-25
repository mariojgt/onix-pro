{{-- need for the editor layout --}}
<link href="{{ asset('vendor/Onix/css/app.css') }}" rel="stylesheet">
{{-- need for the editor basic plugins --}}
<link href="{{ asset('vendor/Onix/grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.css') }}" rel="stylesheet">

<style>

  #onix-grape iframe.gjs-frame {
    width: 85%;
    top: 40px;
    margin: 0;
    padding: 20px 0;
    background-color: white;
  }

  iframe.gjs-frame .gjs-dashed {
   
  }

      #gjs-sm-padding-top,
      #gjs-sm-margin-top {
        position: relative;
      }

      #gjs-sm-padding-top::before,
      #gjs-sm-margin-top::before {
        position: absolute;
        bottom: calc(100% + 0.5rem);
        left: 0;
        font-weight: bold;
      }

      #gjs-sm-padding-top::before {
        content: "Padding";
      }

      #gjs-sm-margin-top::before {
        content: "Margin";
      }

      #gjs-sm-padding-top,
      #gjs-sm-padding-right,
      #gjs-sm-margin-top,
      #gjs-sm-margin-right {
        background-color: rgba(0, 0, 0, 0.1);
        margin-top: 1.5rem;
        border-top: 1px solid rgba(0, 0, 0, 0.25);
      }

      #gjs-sm-padding-top,
      #gjs-sm-padding-bottom,
      #gjs-sm-margin-top,
      #gjs-sm-margin-bottom {
        border-left: 1px solid rgba(0, 0, 0, 0.25);
      }

      #gjs-sm-padding-right,
      #gjs-sm-padding-left,
      #gjs-sm-margin-right,
      #gjs-sm-margin-left {
        border-right: 1px solid rgba(0, 0, 0, 0.25);
      }

      #gjs-sm-padding-bottom,
      #gjs-sm-padding-left,
      #gjs-sm-margin-bottom,
      #gjs-sm-margin-left {
        background-color: rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(0, 0, 0, 0.25);
      }

/* Primary color for the background */
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

/*  end css need for the floating icon */
</style>
