<?php
/**
 * Created by IT-SOLUTIONS.
 * IS CMS
 * User: Vati Child
 * Date: 3/7/15
 * Time: 11:09 PM
 */
defined('_JEXEC') or die();
?>
<ul class="currency">
    <li class="c-usd">
        <div>
            <strong>USD currency</strong><br>
            <span><?=$registry['usd'][0];?></span><br>
            <?if($registry['usd'][2] > 0):?>
                <small style="color:red;"><img src="/<?=$theme?>images/down.png"> <?=$registry['usd'][1];?></small>
            <?else:?>
                <small style="color:green;"><img src="/<?=$theme?>images/up.png"> <?=$registry['usd'][1];?></small>
            <?endif;?>
        </div>
    </li>
    <li class="c-eu">
        <div>
            <strong>EUR currency</strong><br>
            <span><?=$registry['eur'][0];?></span><br>
            <?if($registry['eur'][2] > 0):?>
                <small style="color:red;"><img src="/<?=$theme?>images/down.png"> <?=$registry['eur'][1];?></small>
            <?else:?>
                <small style="color:green;"><img src="/<?=$theme?>images/up.png"> <?=$registry['eur'][1];?></small>
            <?endif;?>
        </div>
    </li>
    <li class="c-uk">
        <div>
            <strong>GBP currency</strong><br>
            <span><?=$registry['gbp'][0];?></span><br>
            <?if($registry['gbp'][2] > 0):?>
                <small style="color:red;"><img src="/<?=$theme?>images/down.png"> <?=$registry['gbp'][1];?></small>
            <?else:?>
                <small style="color:green;"><img src="/<?=$theme?>images/up.png"> <?=$registry['gbp'][1];?></small>
            <?endif;?>
        </div>
    </li>
</ul>
<div class="fix"></div>
<div class="currency-converter" ng-controller="currencyGenerator">
    <h4>Currency Converter</h4>
    <div class="currency-amount">
        <input ng-model="data.amount" ng-change="getResult()" placehold="Enter the amount"  />
        <div>{{data.result | number:2}}</div>
    </div>
    <div class="fix"></div>
    <div class="currency-exchange">
<!--
        <select name="first" ng-change="getC()" ng-model="form.type" required ng-options="fr.id as fr.name_ge for fr in cur.crc">
             <option>ქართული ლარი</option>
        </select>
                <ul>
            <li ng-model="form.sumf" ng-click="openFirst()">{{form.fname}}</li>
            <li  ng-hide="showme.first">
                <ul>
                    <li  ng-repeat="fr in cur.crc"  ng-click="getF(this)">
                        {{fr.name_ge}}
                    </li>
                </ul>
            </li>
        </ul>
        <a ng-click="chC()"></a>
        <ul>
            <li ng-model="form.sums" ng-click="openSecond()">{{form.sname}}</li>
            <li  ng-hide="showme.sec">
                <ul>
                    <li ng-repeat="sec in cur.crc"  ng-click="getS(this)">
                        {{sec.name_ge}}
                    </li>
                </ul>
            </li>
        </ul>
-->
        <ul>
            <li ng-model="data" ng-click="openFirst()"><img src="/<?=$theme?>images/flags/{{data.flagf}}.png" align="left"/>{{data.fname}}</li>
            <li ng-hide="hide.first">
                <ul>
                    <li ng-repeat="fr in data.array"  ng-click="getF(this)">
                        <img src="/<?=$theme?>images/flags/{{fr.name}}.png" align="left"/>{{fr.name_ge}}
                    </li>
                </ul>
            </li>
        </ul>
        <a ng-click="chC()"></a>
        <ul>
            <li ng-model="data" ng-click="openSecond()"><img src="/<?=$theme?>images/flags/{{data.flags}}.png" align="left"/>{{data.sname}}</li>
            <li  ng-hide="hide.sec">
                <ul>
                    <li ng-repeat="sec in data.array"  ng-click="getS(this)">
                        <img src="/<?=$theme?>images/flags/{{sec.name}}.png" align="left"/>{{sec.name_ge}}
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="fix"></div>
<script>
    var valute = <?=$registry['currency'];?>;
</script>