 $(function () {

            $("#sname").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s]+$/;
                if (regex.test($("#sname").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or must be English letters');


                }
            });

            $("#order").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s]+$/;
                if (regex.test($("#order").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or must be English letters');


                }
            });

            $("#order").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s]+$/;
                if (regex.test($("#order").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or must be filled with English letters');


                }
            });

            $("#kingdom").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s]+$/;
                if (regex.test($("#kingdom").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or must be English letters');


                }
            });

            $("#genus").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s]+$/;
                if (regex.test($("#genus").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or must be English letters');


                }
            });

            $("#phylum").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s]+$/;
                if (regex.test($("#phylum").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or must be English letters');


                }
            });
            $("#family").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s]+$/;
                if (regex.test($("#family").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or must be English letters');


                }
            });

            $("#sbfamily").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s]+$/;
                if (regex.test($("#sbfamily").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or must be English letters');


                }
            });

            $("#class").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s]+$/;
                if (regex.test($("#class").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or must be English letters');


                }
            });

            $("#species").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s]+$/;
                if (regex.test($("#species").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or must be English letters');


                }
            });

            $("#cnames").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s\\.\\,]+$/;
                if (regex.test($("#cnames").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or please check your syntax!');


                }
            });

            $("#synonyms").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s\\.\\,\\(\\)]+$/;
                if (regex.test($("#synonyms").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or please check your syntax!');


                }
            });

            $("#roost").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s\\.\\,\\(\\)]+$/;
                if (regex.test($("#roost").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or please check your syntax!');


                }
            });

            $("#conservation_status").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s\\.\\,\\(\\)]+$/;
                if (regex.test($("#conservation_status").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or please check your syntax!');


                }
            });

            $("#occurence").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s\\.\\,\\(\\)]+$/;
                if (regex.test($("#occurence").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or please check your syntax!');


                }
            });
            $("#food").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s\\.\\,\\(\\)]+$/;
                if (regex.test($("#food").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or please check your syntax!');


                }
            });

            $("#breeding").bind("keyup", function (event) {
                var regex = /^[a-zA-Z\s]\\.\\,\\(\\)+$/;
                if (regex.test($("#breeding").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or please check your syntax!');


                }
            });

            $("#threats").bind("keyup", function (event) {
                var regex = /^[a-zA-Z0-9\s\\.\\,\\(\\)]+$/;
                if (regex.test($("#threats").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or please check your syntax!');


                }
            });

            $("#conseravtion").bind("keyup", function (event) {
                var regex = /^[a-zA-Z0-9\s\\.\\,\\(\\)]+$/;
                if (regex.test($("#conseravtion").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or please check your syntax!');


                }
            });

            $("#measurements").bind("keyup", function (event) {
                var regex = /^[a-zA-Z0-9\s\\.\\,\\(\\)\\:\\{\\}\\+\\-\\*\\/]+$/;
                if (regex.test($("#measurements").val())) {
                    $('.validation').html('');
                } else {
                    return confirm('This field can not be empty or please check your syntax!');


                }
            });






        });