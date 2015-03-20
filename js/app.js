/**
 * Created by Vati Child on 10/30/14.
 */
var calApp = angular.module("calApp",['720kb.datepicker']);

calApp.controller("TextController",function($scope){
    $scope.cal1 = "კალკულატორი №1";
    $scope.cal2 = "კალკულატორი №2";
    $scope.cal3 = "კალკულატორი №3";
    $scope.cal4 = "კალკულატორი №4";
});

//კალკულატორი #1
calApp.controller("OneController",function($scope){
    $scope.calOne = {price : 10000, month : 12, last_d_price : 0, last_d_per : 0, sum_d_price : 0, sum_d_per : 0, month_per : 0};

    $scope.months = [];
    for(var i = 1;i<=36; i++){
        $scope.months.push(i);
    }

    var calculateOne = function(){
        //ვადის ბოლოს -> სულ თანხა
        if($scope.calOne.month < 9){
            $scope.calOne.last_d_price = Math.pow(1.022105,$scope.calOne.month) * $scope.calOne.price;
        }else if($scope.calOne.month < 12){
            $scope.calOne.last_d_price = Math.pow(1.023406,$scope.calOne.month) * $scope.calOne.price;
        }else if($scope.calOne.month >= 12){
            $scope.calOne.last_d_price = Math.pow(1.025324,$scope.calOne.month) * $scope.calOne.price;
        }
        //end

        //ყოველთვიურად -> სულ თანახა
        if($scope.calOne.month < 9){
            $scope.calOne.sum_d_price = $scope.calOne.price * (1 + 0.02 * $scope.calOne.month);
        }else if($scope.calOne.month < 12){
            $scope.calOne.sum_d_price = $scope.calOne.price * (1 + 0.022 * $scope.calOne.month);
        }else if($scope.calOne.month >= 12){
            $scope.calOne.sum_d_price = $scope.calOne.price * (1 + 0.025 * $scope.calOne.month);
        }
        //end

        //ვადის ბოლოს -> სულ პროცენტი
        $scope.calOne.last_d_per = parseFloat($scope.calOne.last_d_price) - parseFloat($scope.calOne.price);
        //end
        //ყოველდღიური -> სულ პროცენტი
        $scope.calOne.sum_d_per = parseFloat($scope.calOne.sum_d_price) - parseFloat($scope.calOne.price);
        //end
        //თვის პროცენტი
        $scope.calOne.month_per = $scope.calOne.sum_d_per / $scope.calOne.month;
        //end

    };
    $scope.$watch('calOne.price',calculateOne);
    $scope.$watch('calOne.month',calculateOne);

});


//კალკულატორი #2
calApp.controller("TwoController",function($scope){
    $scope.calTwo = {price : 10000, month : 365, last_d_price : 0, last_d_per : 0, sum_d_price : 0, sum_d_per : 0, month_per : 0};

    var calculateTwo = function(){
        //ვადის ბოლოს -> სულ თანხა
        if($scope.calTwo.month > 1095){
            $scope.calTwo.month = 1095;
        }
        if($scope.calTwo.month < 274){
            $scope.calTwo.last_d_price = Math.pow(1.0007191,$scope.calTwo.month) * $scope.calTwo.price;
        }else if($scope.calTwo.month < 365){
            $scope.calTwo.last_d_price = Math.pow(1.000761,$scope.calTwo.month) * $scope.calTwo.price;
        }else if($scope.calTwo.month >= 365){
            $scope.calTwo.last_d_price = Math.pow(1.0008226,$scope.calTwo.month) * $scope.calTwo.price;
        }
        //end
        //ყოველთვიურად -> სულ თანახა
        if($scope.calTwo.month < 274){
            $scope.calTwo.sum_d_price = Math.pow(1.0005896,$scope.calTwo.month) * $scope.calTwo.price;
        }else if($scope.calTwo.month < 365){
            $scope.calTwo.sum_d_price = Math.pow(1.0006421,$scope.calTwo.month) * $scope.calTwo.price;
        }else if($scope.calTwo.month>=365){
            $scope.calTwo.sum_d_price = Math.pow(1.0007191,$scope.calTwo.month) * $scope.calTwo.price;
        }
        //end

        //ვადის ბოლოს -> სულ პროცენტი
        $scope.calTwo.last_d_per = parseFloat($scope.calTwo.last_d_price) - parseFloat($scope.calTwo.price); //parseFloat($scope.calTwo.last_d_price) - parseFloat($scope.calTwo.price);
        //end
        //ყოველდღიური -> სულ პროცენტი
        $scope.calTwo.sum_d_per = parseFloat($scope.calTwo.sum_d_price) - parseFloat($scope.calTwo.price);
        //end
        //თვის პროცენტი
        $scope.calTwo.month_per = $scope.calTwo.sum_d_per / $scope.calTwo.month * 30.4166667;
        //end
    }

    $scope.$watch('calTwo.price',calculateTwo);
    $scope.$watch('calTwo.month',calculateTwo);

});



//კალკულატორი #4
calApp.controller("FourController",function($scope){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    $scope.calF = {price : 10000, dat : 2014 + ',' + 2 + ',' + 19, month : 6, sum:0, per:0};
    $scope.months = [];
    for(var i = 1;i<=12; i++){
        $scope.months.push(i);
    }
    var calculateF = function(){
        var data = new Date($scope.calF.dat);
        var today = new Date();
        var days = (today.getTime() - data.getTime()) / (1000*60*60*24);

        if($scope.calF.month < 9){
            $scope.calF.sum = Math.pow(1.0007191,Math.round(days)) * parseFloat($scope.calF.price);
        }else if($scope.calF.month < 12){
            $scope.calF.sum = Math.pow(1.000761,Math.round(days)) * parseFloat($scope.calF.price);
        }else if($scope.calF.month >= 12){
            $scope.calF.sum = Math.pow(1.0008226,Math.round(days)) * parseFloat($scope.calF.price);
        }

        $scope.calF.per = $scope.calF.sum - $scope.calF.price;
    }
    $scope.$watch('calF.price',calculateF);
    $scope.$watch('calF.month',calculateF);
    $scope.$watch('calF.dat',calculateF);

});



//კალკულატორი 3
calApp.controller('ThreeController',function($scope){
    $scope.calT = {price: 10000, sum: 11200, month: 6, percent: 11401.79, all: 1401.79};

    var calculateT = function(){
        if($scope.calT.month > 36){
            $scope.calT.month = 36;
        }

        $scope.options = [];

        var c50 = (parseFloat($scope.calT.sum) - parseFloat($scope.calT.price)) / parseFloat($scope.calT.price) + 1;

        var e50 = 0;
        for(var i=1; i<=36; i++){
            c50 = c50 / 1.025324;
            if(c50 > 1){e50 = e50 + 1;}else{e50 = e50 + 0;}
            //$scope.options.push({id: c50});
        }
        var e49 = parseFloat(e50) + 1;

        $scope.calT.month = (e49 < 6) ? 6 : e49;
        if($scope.calT.month < 9){
            $scope.calT.all = Math.pow(1.022105, $scope.calT.month) * $scope.calT.price;
        }else if($scope.calT.month < 12){
            $scope.calT.all = Math.pow(1.023406, $scope.calT.month) * $scope.calT.price;
        }else if($scope.calT.month >= 12){
            $scope.calT.all = Math.pow(1.025324, $scope.calT.month) * $scope.calT.price;
        }
        $scope.calT.percent = $scope.calT.all - $scope.calT.price;
    }

    $scope.$watch('calT.price',calculateT);
    $scope.$watch('calT.sum',calculateT);
});


calApp.controller('currencyGenerator',function($scope){

    $scope.data = {amount: 0, result: 0, array: valute, fid:0, sid: 41, fname: '', sname: '', flagf: 'GEL', flags: 'USD'};
    $scope.hide = {first: true, sec: true, change: false};
    $scope.data.fname = $scope.data.array[$scope.data.fid].name_ge;
    $scope.data.sname = $scope.data.array[$scope.data.sid].name_ge;
    $scope.sum = [];
    $scope.name = [];
    var i = 0;
    $scope.data.array.forEach(function(entry){
        $scope.name[i] = entry.title.split(' ');
        $scope.sum[i] = parseFloat(entry.currency) / $scope.name[i][0];
        i++;
    });


    $scope.openFirst = function(){
        if($scope.hide.first == true){
            $scope.hide.first = false;
        }else{
            $scope.hide.first = true;
        }
    }

    $scope.openSecond = function(){
        if($scope.hide.sec == true){
            $scope.hide.sec = false;
        }else{
            $scope.hide.sec = true;
        }
    }

    $scope.getF = function($scope){
        $scope.data.fid = $scope.fr.id - 1;
        $scope.hide.first = true;
        $scope.data.fname = $scope.data.array[$scope.data.fid].name_ge;
        $scope.data.flagf = $scope.data.array[$scope.data.fid].name;
        $scope.data.result = parseFloat($scope.data.amount) * ($scope.sum[$scope.data.fid] / $scope.sum[$scope.data.sid]);
    }

    $scope.getS = function($scope){
        $scope.data.sid = $scope.sec.id - 1;
        $scope.hide.sec = true;
        $scope.data.sname = $scope.data.array[$scope.data.sid].name_ge;
        $scope.data.flags = $scope.data.array[$scope.data.sid].name;
        $scope.data.result = parseFloat($scope.data.amount) * ($scope.sum[$scope.data.fid] / $scope.sum[$scope.data.sid]);

    }



    $scope.chC = function(){
        if($scope.hide.change == false){
            $scope.data.fname = [$scope.data.sname,$scope.data.sname = $scope.data.fname][0];
            $scope.data.fid = [$scope.data.sid,$scope.data.sid = $scope.data.fid][0];
            $scope.data.flagf = [$scope.data.flags,$scope.data.flags = $scope.data.flagf][0];

            $scope.data.result = parseFloat($scope.data.amount) * ($scope.sum[$scope.data.fid] / $scope.sum[$scope.data.sid]);
            $scope.hide.change = true;
        }else{
            $scope.data.sname = [$scope.data.fname,$scope.data.fname = $scope.data.sname][0];
            $scope.data.sid = [$scope.data.fid,$scope.data.fid = $scope.data.sid][0];
            $scope.data.flags = [$scope.data.flagf,$scope.data.flagf = $scope.data.flags][0];
            $scope.data.result = parseFloat($scope.data.amount) * ($scope.sum[$scope.data.fid] / $scope.sum[$scope.data.sid]);
            $scope.hide.change = false;
        }
    }


    var getResult = function(){
        $scope.data.result = parseFloat($scope.data.amount) * ($scope.sum[$scope.data.fid] / $scope.sum[$scope.data.sid]);
    }


    $scope.$watch('data.amount',getResult);

});


calApp.directive('placehold', function() {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function(scope, element, attr, ctrl) {

            var value;

            var placehold = function () {
                element.val(attr.placehold)
            };
            var unplacehold = function () {
                element.val('');
            };

            scope.$watch(attr.ngModel, function (val) {
                value = val || '';
            });

            element.bind('focus', function () {
                if(value == '') unplacehold();
            });

            element.bind('blur', function () {
                if (element.val() == '' || element.val()==0) placehold();
            });

            ctrl.$formatters.unshift(function (val) {
                if (!val || val == 0) {
                    placehold();
                    value = '';
                    return attr.placehold;
                }
                return val;
            });
        }
    };
});