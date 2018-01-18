<p><a href="#example9Content" class="example9DOMWindow">Open DOM Window</a></p> 
<p><a href="#example9aContent" class="example9aDOMWindow">Open DOM Window</a></p> 
<script type="text/javascript"> 
$('.example9DOMWindow').click(function(){ 
    $.openDOMWindow({ 
        windowSourceID:'#example9Content', 
        height:220,  
        width:320, 
        overlay:0, 
        positionType:'anchoredSingleWindow',  
        windowPadding:20,  
        windowBGColor:'#ccc',  
        borderSize:'0', 
        anchoredSelector:'.example9DOMWindow', 
        positionLeft:120, 
        positionTop:-150 
    }); 
    return false; 
}); 
$('.example9aDOMWindow').click(function(){ 
    $.openDOMWindow({ 
        windowSourceID:'#example9Content', 
        height:220,  
        width:320, 
        overlay:0, 
        positionType:'anchoredSingleWindow',  
        windowPadding:20,  
        windowBGColor:'#ccc',  
        borderSize:'0', 
        anchoredSelector:'.example9aDOMWindow', 
        positionLeft:120, 
        positionTop:-150 
    }); 
    return false; 
}); 
</script> 
<div id="example9Content" style=" display:none;"> 
<p>Inline Content</p> 
<p><a href="#" class="closeDOMWindow">close</a></p> 
<p>Consequat ea Investigationes in enim congue. Option velit volutpat quod blandit ex. Congue parum praesent aliquam nam clari. Qui praesent quam sollemnes id vulputate. In imperdiet diam at sequitur et. Minim delenit in dolor dolore typi.</p> 
</div>