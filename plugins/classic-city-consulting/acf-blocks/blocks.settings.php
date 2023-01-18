<?php
$all_classes = "";
$id = $block['id']; // Block ID
$align = $block['align'] ? 'align' . $block['align'] : ''; // Align Class

if(isset($block['className'])) {
    $all_classes = $block['className']; // Block Custom Classes
}
$all_classes .= " " . $align;