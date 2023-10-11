let BDSDetailController = function ($scope, $routeParams, $http, $location) {
    $scope.ma = $routeParams.id;
    $scope.inputs = {
        name: "",
        type_id: "",
        area: "",
        price: "",
        image_url: "",
        status: ""
    }
    $scope.error ={}
    $scope.category_bds = {
        id: "",
        name: "",
    }
    $http.get(`${API_URL}category_bds`)
        .then(
            function (res) {
                $scope.loading = false;
                $scope.category_bds = res.data;
            },
            function (err) { console.log(err); }
        );
    $scope.onGetDetail = function (id) {
        $http.get(`${API_BDS}/${id}`).then(
            function (res) {
                $scope.inputs = { ...res.data };
            },
            function (err) { }
        );
    };
    if ($scope.ma != undefined) {
        $scope.onGetDetail($scope.ma)
    }
    else {
        $scope.inputs = {}
    }
    $scope.onSave = function () {
     
    
    }
};
