<?php defined('_JEXEC') or die(); ?>
<div class="calculator-one">
<form ng-controller="OneController">
    <div class="one-left">
    თანხა: <input ng-change="calculateOne()" ng-model="calOne.price" class="calculator-text"> <br><br>

    ანაბრის ვადა (თვე): <select  ng-change="calculateOne()" ng-model="calOne.month" class="calculator-select">
        <option ng-repeat="month in months">{{month}}</option>
    </select>
    </div>
    <div class="one-right">
    <table width="600px" border="0">
        <tr>
            <th></th><th>სულ თანხა</th><th>სულ პროცენტი</th><th>თვის პროცენტი</th>
        </tr>
        <tr>
            <td align="center">ვადის ბოლოს</td><td align="center">{{calOne.last_d_price | currency}}</td><td align="center">{{calOne.last_d_per | number:2}}</td><td></td>
        </tr>
        <tr>
            <td align="center">ყოველთვიურად</td><td align="center">{{calOne.sum_d_price | currency}}</td><td align="center">{{calOne.sum_d_per | number:2}}</td><td align="center">{{calOne.month_per | number:2}}</td>
        </tr>
    </table>
    </div>
</form>
</div>