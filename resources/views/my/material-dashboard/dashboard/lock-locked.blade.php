@php 
$svg = '
<svg xmlns="http://www.w3.org/2000/svg"
    width="42"
    height="42"
	viewBox="0 0 0.433863 0.599923"
	style="position:absolute; top:14px; left:14px">
	<!-- fill="#FFB83E" -->
    <path
        fill="#FEFEFE"
        d="M0.216936,0.000021c-0.096733,0 -0.175432,0.078695 -0.175432,0.175432l0,0.100193c0,0.001137 -0.001406,0.003055 -0.002509,0.003423 -0.009488,0.003163 -0.01719,0.005904 -0.024243,0.008624 -0.008413,0.003241 -0.014755,0.012564 -0.014755,0.021684l0,0.230215c0,0.009058 0.006301,0.018385 0.01466,0.021697 0.064664,0.025624 0.132717,0.038614 0.202276,0.038614 0.069559,0 0.137616,-0.012994 0.202284,-0.038614 0.008351,-0.003312 0.014652,-0.012638 0.014652,-0.021697l0,-0.230215c0,-0.00912 -0.006342,-0.018443 -0.014755,-0.021688 -0.007057,-0.002716 -0.014763,-0.005457 -0.024239,-0.008624 -0.001104,-0.000364 -0.002509,-0.002286 -0.002509,-0.003423l0,-0.100193c-0.000004,-0.096733 -0.078699,-0.175428 -0.175428,-0.175428zM0.169152,0.37949c0,-0.026405 0.02139,-0.047779 0.047779,-0.047779 0.026385,0 0.047779,0.02137 0.047779,0.047779 0,0.0175 -0.009868,0.032152 -0.023892,0.040458l0,0.078993c0,0.013205 -0.010683,0.023888 -0.023888,0.023888 -0.013209,0 -0.023892,-0.010683 -0.023892,-0.023888l0,-0.078993c-0.014019,-0.008306 -0.023888,-0.022957 -0.023888,-0.040458zM0.332042,0.175449l0,0.086447c-0.037746,-0.00812 -0.076475,-0.012233 -0.115093,-0.012237 -0.038601,0 -0.077318,0.004114 -0.115126,0.012229l0,-0.086439c0,-0.063473 0.051637,-0.11511 0.11511,-0.11511 0.063469,0 0.11511,0.051637 0.11511,0.11511z" />
</svg>';
@endphp

{!! preg_replace("/\n/","",$svg) !!}