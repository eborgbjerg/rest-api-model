<?php


$the_path = $_SERVER['PATH_INFO'];

$arr_path_elements = explode('/', $the_path);

$method = strtolower($_SERVER['REQUEST_METHOD']);
switch($method) {
    case 'get':
        // if no product ID, send back a list
        if (count($arr_path_elements) < 2 || empty($arr_path_elements[1]) ) {
            // send a list of products
            echo ' here is a list of products ';
        }
        else {
            $id = $arr_path_elements[1];
            $product[$id] = [
                'id' => $id,
                'position' => [
                    'title' => 'PHP Developer',
                    ],
                ];
            $json = json_encode($product[$id]);
            http_response_code(200);
            header('Content-Type: application/json');
            print $json;
        }
        break;

    case 'post':
        echo 'we are dealing with a POST request';
        // read object from body
        // and store it 
        break;

    case 'put':
        echo 'we are dealing with a PUT request';
        break;
    case 'delete':
        echo 'we are dealing with a DELETE request';
        break;
    default:
        // unimplemented method
        http_response_code(405);
}
