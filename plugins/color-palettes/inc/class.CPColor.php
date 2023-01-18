<?php
Class CPColor {

    public $name = "";
    public $rgb;
    public $hsv;
    public $hex = "";
    public $opposite = array();
    public $shades = array();

    public function __construct($hex_value, $name = "", $no_shades = false) {

        // Set RGB/HSV as classes
        $this->rgb = new stdClass();
        $this->rgb->r = 0;
        $this->rgb->g = 0;
        $this->rgb->b = 0;

        // Set RGB/HSV as classes
        $this->hsv = new stdClass();
        $this->hsv->h = 0;
        $this->hsv->s = 0;
        $this->hsv->v = 0;

        // Set hex
        $hex_value = str_replace('#', '', $hex_value);
        $this->hex = $hex_value;

        // Set the name of the color
        $this->name = $name;

        // Convert
        $this->setup($no_shades);

    }

    public function setup($no_shades = false) {

        // Convert to RGB
        $this->HEXtoRGB();

        // Convert to HSV
        $this->RGBtoHSV();

        // Only run if we have to
        if($no_shades !== true) {

            // Get the shades
            $this->get_shades();

        }

        // Get the opposite color
        $this->get_opposite_color();

    }

    public function change_brightness($saturation,$value) {

        // Set the brightness
        $this->hsv->s = $saturation;
        $this->hsv->v = $value;

        // Convert back to RGB
        $this->HSVtoRGB();

        // Convert back to Hex
        $this->RGBtoHEX();

        // Get the opposite color
        $this->get_opposite_color();

    }

    public function HEXtoRGB() {

        $length   = strlen($this->hex);
        $this->rgb->r = hexdec($length == 6 ? substr($this->hex, 0, 2) : ($length == 3 ? str_repeat(substr($this->hex, 0, 1), 2) : 0));
        $this->rgb->g = hexdec($length == 6 ? substr($this->hex, 2, 2) : ($length == 3 ? str_repeat(substr($this->hex, 1, 1), 2) : 0));
        $this->rgb->b = hexdec($length == 6 ? substr($this->hex, 4, 2) : ($length == 3 ? str_repeat(substr($this->hex, 2, 1), 2) : 0));

    }

    public function RGBtoHSV() {
        // Convert the RGB byte-values to percentages
        $R = $this->rgb->r / 255;
        $G = $this->rgb->g / 255;
        $B = $this->rgb->b / 255;

        // Calculate a few basic values, the maximum value of R,G,B, the
        //   minimum value, and the difference of the two (chroma).
        $maxRGB = max($R, $G, $B);
        $minRGB = min($R, $G, $B);
        $chroma = $maxRGB - $minRGB;

        // Value (also called Brightness) is the easiest component to calculate,
        //   and is simply the highest value among the R,G,B components.
        // We multiply by 100 to turn the decimal into a readable percent value.
        $this->hsv->v = 100 * $maxRGB;

        // Special case if hueless (equal parts RGB make black, white, or grays)
        // Note that Hue is technically undefined when chroma is zero, as
        //   attempting to calculate it would cause division by zero (see
        //   below), so most applications simply substitute a Hue of zero.
        // Saturation will always be zero in this case, see below for details.
        if ($chroma == 0) {
            $this->hsv->h = 0;
            $this->hsv->s = 0;
        } else {


            // Saturation is also simple to compute, and is simply the chroma
            //   over the Value (or Brightness)
            // Again, multiplied by 100 to get a percentage.
            $this->hsv->s = 100 * ($chroma / $maxRGB);

            // Calculate Hue component
            // Hue is calculated on the "chromacity plane", which is represented
            //   as a 2D hexagon, divided into six 60-degree sectors. We calculate
            //   the bisecting angle as a value 0 <= x < 6, that represents which
            //   portion of which sector the line falls on.
            if ($R == $minRGB)
                $h = 3 - (($G - $B) / $chroma);
            elseif ($B == $minRGB)
                $h = 1 - (($R - $G) / $chroma);
            else // $G == $minRGB
                $h = 5 - (($B - $R) / $chroma);

            // After we have the sector position, we multiply it by the size of
            //   each sector's arc (60 degrees) to obtain the angle in degrees.
            $this->hsv->h = 60 * $h;

        }

    }

    public function HSVtoRGB() {

        $iH = $this->hsv->h;
        $iS = $this->hsv->s;
        $iV = $this->hsv->v;

        if($iH < 0)   $iH = 0;   // Hue:
        if($iH > 360) $iH = 360; //   0-360
        if($iS < 0)   $iS = 0;   // Saturation:
        if($iS > 100) $iS = 100; //   0-100
        if($iV < 0)   $iV = 0;   // Lightness:
        if($iV > 100) $iV = 100; //   0-100

        $dS = $iS/100.0; // Saturation: 0.0-1.0
        $dV = $iV/100.0; // Lightness:  0.0-1.0
        $dC = $dV*$dS;   // Chroma:     0.0-1.0
        $dH = $iH/60.0;  // H-Prime:    0.0-6.0
        $dT = $dH;       // Temp variable

        while($dT >= 2.0) $dT -= 2.0; // php modulus does not work with float
        $dX = $dC*(1-abs($dT-1));     // as used in the Wikipedia link

        switch(floor($dH)) {
            case 0:
                $dR = $dC; $dG = $dX; $dB = 0.0; break;
            case 1:
                $dR = $dX; $dG = $dC; $dB = 0.0; break;
            case 2:
                $dR = 0.0; $dG = $dC; $dB = $dX; break;
            case 3:
                $dR = 0.0; $dG = $dX; $dB = $dC; break;
            case 4:
                $dR = $dX; $dG = 0.0; $dB = $dC; break;
            case 5:
                $dR = $dC; $dG = 0.0; $dB = $dX; break;
            default:
                $dR = 0.0; $dG = 0.0; $dB = 0.0; break;
        }

        $dM  = $dV - $dC;
        $dR += $dM; $dG += $dM; $dB += $dM;
        $dR *= 255; $dG *= 255; $dB *= 255;

        $this->rgb->r = $dR;
        $this->rgb->g = $dG;
        $this->rgb->b = $dB;

    }

    public function RGBtoHEX() {
        $this->hex = sprintf("%02x%02x%02x", $this->rgb->r,$this->rgb->g,$this->rgb->b);
    }

    public function get_opposite_color() {

        $core_color = 0.2126 * pow($this->rgb->r/255, 2.2) +
            0.7152 * pow($this->rgb->g/255, 2.2) +
            0.0722 * pow($this->rgb->b/255, 2.2);

        $gray = 0.2126 * pow(51/255, 2.2) +
            0.7152 * pow(51/255, 2.2) +
            0.0722 * pow(51/255, 2.2);

        $white = 0.2126 * pow(255/255, 2.2) +
            0.7152 * pow(255/255, 2.2) +
            0.0722 * pow(255/255, 2.2);

        // Luminance distance
        $color_between_gray = abs($core_color - $gray);
        $color_between_white = abs($core_color - $white);

        // Which color is father?
        if($color_between_white > $color_between_gray) {
            $this->opposite = "FFFFFF";
        } else {
            $this->opposite = "333333";
        }

    }


    public function get_shades() {

        // Quantity of steps (4 steps above and below the core color)
        $steps = 4;

        // Saturation math
        $saturation_minimum = 2;
        $saturation_maximum = $this->hsv->s;
        $saturation_increment = ($saturation_maximum - $saturation_minimum) / $steps;

        // Value math
        $value_minimum = 10;
        $value_maximum = $this->hsv->v;
        $value_increment = ($value_maximum - $value_minimum) / $steps;

        // Combining Saturation and Value



        // Loop through each step (and include the max [hence, the +1])
        for($i=1;$i<=4;$i++) {

            // New saturation
            $new_saturation = $saturation_minimum + ($saturation_increment * $i);

            // New color
            $new_color = new CPColor($this->hex,'',true);
            $new_color->change_brightness($new_saturation,$this->hsv->v);

            // Color weight
            $weight = $i * 100;

            $this->shades[$weight]['color'] = "#".$new_color->hex;
            $this->shades[$weight]['opposite'] = "#".$new_color->opposite;

//            $this->shades[] = array(
//                's'         => $new_saturation,
//                'v'         => $this->hsv->v
//            );

        }

        // Adding in the current color
        $this->shades[500]['color'] = "#".$this->hex;
        $this->shades[500]['opposite'] = "#".$this->opposite;

        // Loop through each step (and include the max [hence, the +1])
        for($i=0;$i<=4;$i++) {

            // New value
            $new_value = $value_maximum - ($value_increment * $i);

            // New color
            $new_color = new CPColor($this->hex,'',true);
            $new_color->change_brightness($this->hsv->s,$new_value);

            // Color weight
            $weight = ($i + 4) * 100;

            $this->shades[$weight]['color'] = "#".$new_color->hex;
            $this->shades[$weight]['opposite'] = "#".$new_color->opposite;

        }


    }

}