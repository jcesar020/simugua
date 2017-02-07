<?php
/**
 * Created by PhpStorm.
 * User: jcesa
 * Date: 23/06/2016
 * Time: 22:51
 */





echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("01071980", "C39") . '" alt="barcode"   />';
echo '<br>';echo '<br>';
echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("01071980", "C128") . '" alt="barcode"   />';
echo '<br>';echo '<br>';
echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("4445645656", "PHARMA2T") . '" alt="barcode"   />';
echo '<br>';echo '<br>';
echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("4445645656", "CODE11") . '" alt="barcode"   />';
echo '<br>';echo '<br>';
echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("01071980", "EAN5") . '" alt="barcode"   />';
echo '<br>';echo '<br>';
echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("01071980", "CODABAR") . '" alt="barcode"   />';
echo '<br>';echo '<br>';




;
