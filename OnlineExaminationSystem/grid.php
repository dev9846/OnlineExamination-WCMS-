
<?php
/*

   CSS Grid Generator used for 760.css project - http://code.google.com/p/760-css/
   
   Copyright (c) 2009 Jim Myhrberg.

   Permission is hereby granted, free of charge, to any person obtaining
   a copy of this software and associated documentation files (the
   "Software"), to deal in the Software without restriction, including
   without limitation the rights to use, copy, modify, merge, publish,
   distribute, sublicense, and/or sell copies of the Software, and to
   permit persons to whom the Software is furnished to do so, subject to
   the following conditions:

   The above copyright notice and this permission notice shall be
   included in all copies or substantial portions of the Software.

   THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
   EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
   MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
   NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
   LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
   OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
   WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
   
   ------------------------------------------------------------------------------
   
   For the record: I know PHP isn't the best/preferred language for a script
   like this. But I had less than an hour to create it at work, or I would
   have had to go the manual CSS way for a particular project.
   
   And when it comes to speed, I'm for better or worse, still fastest and
   and most familar with PHP.

*/



$grids = array(
        array(
                'width' => 760,
                'cells' => 20,
                'margin' => 0,
        ),
        array(
                'width' => 760,
                'cells' => 38,
                'margin' => 0,
        ),
        array(
                'width' => 760,
                'cells' => 76,
                'margin' => 0,
        ),
);


$classes = array();
foreach( $grids as $value ) {
       
        $width = $value['width'];
        $cells = $value['cells'];
        $margin = $value['margin'];
        $cell_size = $width / $cells;

        // containers
        $key  = "\tmargin-left: auto;\n";
        $key .= "\tmargin-right: auto;\n";
        $key .= "\twidth: " . $width . "px;\n";
        $val = ".container_" . $cells;
        $classes[$key][$val] = $val;
       
        // global
        $key  = "\tdisplay: inline;\n";
        $key .= "\tfloat: left;\n";
        $key .= "\tmargin-left: " . $margin . "px;\n";
        $key .= "\tmargin-right: " . $margin . "px;\n";
        for ( $i=1; $i <= $cells; $i++ ) {
                $val = ".grid_" . $i;
                $classes[$key][$val] = $val;
        }
       
        // alpha / omega
        $key = "\tmargin-left: 0;\n";
        $val = ".alpha";
        $classes[$key][$val] = $val;
        $key = "\tmargin-right: 0;\n";
        $val = ".omega";
        $classes[$key][$val] = $val;
       
        // grid_*
        for ( $i=1; $i <= $cells; $i++ ) {
                $key = "\twidth: " . (($cell_size * $i) - ($margin * 2)) . "px;\n";
                $val = ".container_" . $cells . " .grid_" . $i;
                $classes[$key][$val] = $val;
        }
       
        // prefix_*
        for ( $i=1; $i < $cells; $i++ ) {
                $key = "\tpadding-left: " . (($cell_size) * $i) . "px;\n";
                $val = ".container_" . $cells . " .prefix_" . $i;
                $classes[$key][$val] = $val;
        }
       
        // suffix_*
        for ( $i=1; $i < $cells; $i++ ) {
                $key = "\tpadding-right: " . (($cell_size) * $i) . "px;\n";
                $val = ".container_" . $cells . " .suffix_" . $i;
                $classes[$key][$val] = $val;
        }
       
}

       
// clear
$key  = "\tclear: both;\n";
$key .= "\tdisplay: block;\n";
$key .= "\toverflow: hidden;\n";
$key .= "\tvisibility: hidden;\n";
$key .= "\twidth: 0;\n";
$key .= "\theight: 0;\n";
$val = ".clear";
$classes[$key][$val] = $val;

// clearfix
$key  = "\tclear: both;\n";
$key .= "\tcontent: '.';\n";
$key .= "\tdisplay: block;\n";
$key .= "\tvisibility: hidden;\n";
$key .= "\theight: 0;\n";
$val = ".clearfix:after";
$classes[$key][$val] = $val;

$key = "\tdisplay: inline-block;\n";
$val = ".clearfix";
$classes[$key][$val] = $val;

$key = "\theight: 1%;\n";
$val = "* html .clearfix";
$classes[$key][$val] = $val;

$key = "\tdisplay: block;\n";
$val = ".clearfix";
$classes[$key][$val] = $val;

$output = "";
foreach( $classes as $key => $value ) {
        $output .= implode(",\n", $value) . " {\n";
        $output .= $key;
        $output .= "}\n";
        $output .= "\n";
}

echo $output;

?>
