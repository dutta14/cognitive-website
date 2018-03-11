var myApp = angular.module('myApp', ['ngAnimate']);

myApp.controller('MyController', function MyController($http, $scope) {
    
    
    function httpreq(inpurl, inpparams) {
        $http({
            method: 'GET',
            url: inpurl,
            params: inpparams
        }).
            then(function success(response) {
                console.log(response.data);
                $scope.users = response.data;
                $scope.users.start = new Date($scope.users.start);
                $scope.users.end = new Date($scope.users.end);  
            }, function error(response) {
            console.log(response.data);
            console.log(response.error);
        });
    }
    
    $(".table-responsive, #progress, #prev, #next").hide();
    
    $scope.firstpage = function () {
        $scope.word = $('#searchbox').val();
        if($scope.word !== "")
            params = { userid: $scope.word };
        else
            params = { userid: -999};
        httpreq('data.php', params);
        console.log("start");
       
    };

    
    $scope.tabclass = function(index) {
        if(index == 0)
            return "tab-pane fade in active";
        else
            return "tab-pane fade";
    }
    
    $scope.showdetails = function (item) {
        
        $("#alldetails").hide();
        $("#indidetails").show();
        
        $scope.current = item;
        $scope.sections = item.sections;
        
        $scope.vocab = item.sections[0];
        $scope.ns = item.sections[1];
        $scope.tmex = item.sections[2];
        $scope.tm = item.sections[3];
        $scope.ar = item.sections[4];
        $scope.rt = item.sections[5];
        $scope.sv = item.sections[6];
    };
    
    $scope.goback = function () {
        $("#alldetails").show();
        $("#indidetails").hide();
    };
    
    $scope.makeactive = function() {
        $(".tabs").removeClass("active");
        $("#tabh0").addClass("active");
    }
    
    $scope.result = function(answer) {
       if(answer)
           return "glyphicon glyphicon-ok";
        else
            return "glyphicon glyphicon-remove";
    }
    
    $scope.delete = function(uid) {
        params = { uid: uid};
        httpreq('removedata.php', params);
    }
    
    $scope.clear = function () {
        $("#searchbox").val("");
    };
    
    $scope.removett = function() {
        $('#searchbox').tooltip('destroy');
    }
    
    $("#indidetails").hide();
});


