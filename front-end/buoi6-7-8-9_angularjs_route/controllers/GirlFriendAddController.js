let GirlFriendAddController = function ($scope, $routeParams, $http) {
    $scope.inputs = {
        ten: '',
        img:""
    }
    $scope.onChangeImg=function () {
        console.log(event.target.files);
        let img=event.target.files[0].name;
        $scope.inputs.img=img;
        console.log( $scope.inputs.img);
    }
    $scope.onSave = function () {
        $http.post(API_NY, $scope.inputs).then(
            function (res) { $location.path('/quan-ly') },
            function (err) { },
        )
    }

}