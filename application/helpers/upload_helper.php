<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function _maybe_create_upload_path($path)
{
    if (!file_exists($path)) {
        mkdir($path);
        fopen($path . 'index.html', 'w');
    }
}
/**
 * Check for agent profile image
 * @return boolean
 */
function handle_agent_profile_image_upload($id = '')
{
    if (isset($_FILES['profile_image']['name']) && $_FILES['profile_image']['name'] != '') {
        $path        = get_upload_path_by_type('agent_profile_pic') . $id . '/';

        // Get the temp file path
        $tmpFilePath = $_FILES['profile_image']['tmp_name'];
        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["profile_image"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'jpg',
                'jpeg',
                'png'
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            _maybe_create_upload_path($path);
            $filename    = $_FILES["profile_image"]["name"];
            $newFilePath = $path . $filename;
            // Upload the file into the company uploads dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $CI =& get_instance();
                $config                   = array();
                $config['image_library']  = 'gd2';
                $config['source_image']   = $newFilePath;
                $config['new_image']      = 'thumb_' . $filename;
                $config['maintain_ratio'] = true;
                $config['width']          = 160;
                $config['height']         = 160;
                $CI->load->library('image_lib', $config);
                $CI->image_lib->resize();
                $CI->image_lib->clear();
                $CI->db->where('id', $id);
                $CI->db->update('hotel_tbl_agents', array(
                    'profile_image' => $filename
                ));
                // Remove original image
                unlink($newFilePath);
                return true;
            }
        }
    }
    return false;
}

function handle_license_upload($id = '')
{
    if (isset($_FILES['tradefile']['name']) && $_FILES['tradefile']['name'] != '') {
        // print_r($_FILES['tradefile']);
        // exit();
        $path        = get_upload_path_by_type('trade_license_pic'). $id . '/';        
        // Get the temp file path
        $tmpFilePath = $_FILES['tradefile']['tmp_name'];
        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["tradefile"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
               'jpg', 'jpeg', 'png',
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }            
            _maybe_create_upload_path($path);
            $filename    = $_FILES["tradefile"]["name"];
            $newFilePath = $path . $filename;          
            // Upload the file into the company uploads dir
            // move_uploaded_file($tmpFilePath, $newFilePath);
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $CI =& get_instance();
                $config                   = array();
                $config['image_library']  = 'gd2';
                $config['source_image']   = $newFilePath;
                $config['new_image']      = $filename;
                $config['maintain_ratio'] = true;
                // $config['width']          = 160;
                // $config['height']         = 160; 
                $CI->load->library('image_lib', $config);
                $CI->image_lib->resize();
                $CI->image_lib->clear();
                $CI->db->where('id', $id);
                $CI->db->update('hotel_tbl_agents', array(
                    'tradefile' => $filename
                ));
                // Remove original image
                // unlink($newFilePath);
                return true;
            }
        }
    }
    return false;
}
function handle_agent_logo_upload($id = '')
{
    if (isset($_FILES['logo']['name']) && $_FILES['logo']['name'] != '') {
        // print_r($_FILES['logo']);
        // exit();
        $path        = get_upload_path_by_type('agent_logo_pic'). $id . '/';  
        // Get the temp file path
        $tmpFilePath = $_FILES['logo']['tmp_name'];
        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["logo"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
               'jpg', 'jpeg', 'png',
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }            
            _maybe_create_upload_path($path);
            $filename    = $_FILES["logo"]["name"];
            $newFilePath = $path . $filename;          
            // Upload the file into the company uploads dir
            // move_uploaded_file($tmpFilePath, $newFilePath);
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $CI =& get_instance();
                $config                   = array();
                $config['image_library']  = 'gd2';
                $config['source_image']   = $newFilePath;
                $config['new_image']      = $filename;
                $config['maintain_ratio'] = true;
                // $config['width']          = 160;
                // $config['height']         = 160; 
                $CI->load->library('image_lib', $config);
                $CI->image_lib->resize();
                $CI->image_lib->clear();
                $CI->db->where('id', $id);
                $CI->db->update('hotel_tbl_agents', array(
                    'logo' => $filename
                ));
                // Remove original image
                // unlink($newFilePath);
                return true;
            }
        }
    }
    return false;
}


function handle_genaral_images_upload($id = '')
{
    if (isset($_FILES['logo']['name']) && $_FILES['logo']['name'] != '') {
        $path        = get_upload_path_by_type('general');

        
        // Get the temp file path
        $tmpFilePath = $_FILES['logo']['tmp_name'];

        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["logo"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'png',
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            
            _maybe_create_upload_path($path);

            $filename    = "logo1.png";
            $newFilePath = $path . $filename;
            
            // Upload the file into the company uploads dir
           move_uploaded_file($tmpFilePath, $newFilePath);
        }
    }

    return false;
}
function handle_genaral_fav_icon_upload($id = '')
{
    if (isset($_FILES['fav_icon']['name']) && $_FILES['fav_icon']['name'] != '') {
        $path        = get_upload_path_by_type('general');

        
        // Get the temp file path
        $tmpFilePath = $_FILES['fav_icon']['tmp_name'];

        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["fav_icon"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'ico',
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            
            _maybe_create_upload_path($path);

            $filename    = "fav.ico";
            $newFilePath = $path . $filename;
            
            // Upload the file into the company uploads dir
           move_uploaded_file($tmpFilePath, $newFilePath);
        }
    }

    return false;
}
function handle_user_profile_image_upload($id = '')
{
    if (isset($_FILES['Img']['name']) && $_FILES['Img']['name'] != '') {
        $path        = get_upload_path_by_type('user_profile_pic') . $id . '/';

        // Get the temp file path
        $tmpFilePath = $_FILES['Img']['tmp_name'];
        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["Img"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'jpg',
                'jpeg',
                'png'
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            _maybe_create_upload_path($path);
            $filename    = $_FILES["Img"]["name"];
            $newFilePath = $path . $filename;
            // Upload the file into the company uploads dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $CI =& get_instance();
                $config                   = array();
                $config['image_library']  = 'gd2';
                $config['source_image']   = $newFilePath;
                $config['new_image']      = 'thumb_' . $filename;
                $config['maintain_ratio'] = true;
                $config['width']          = 160;
                $config['height']         = 160;
                $CI->load->library('image_lib', $config);
                $CI->image_lib->resize();
                $CI->image_lib->clear();
                $CI->db->where('id', $id);
                $CI->db->update('hotel_tbl_user', array(
                    'Img' => $filename
                ));
                // Remove original image
                unlink($newFilePath);

                return true;
            }
        }
    }

    return false;
}
function handle_ico_image_upload($id = '')
{
    if (isset($_FILES['icon_src']['name']) && $_FILES['icon_src']['name'] != '') {
        $path        = get_upload_path_by_type('icon_up');
        // Get the temp file path
    
        $tmpFilePath = $_FILES['icon_src']['tmp_name'];
        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["icon_src"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'png'
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            _maybe_create_upload_path($path);
            
            $filename    = "ico_black_0".$id.".".$extension;
            $newFilePath = $path . $filename;
            // Upload the file into the company uploads dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                $CI =& get_instance();
                $config                   = array();
                $config['image_library']  = 'gd2';
                $config['source_image']   = $newFilePath;
                $config['new_image']      = $filename;
                $config['maintain_ratio'] = true;
                $config['width']          = 160;
                $config['height']         = 160;
                $CI->load->library('image_lib', $config);
                $CI->image_lib->resize();
                $CI->image_lib->clear();
                $CI->db->where('id', $id);
                $CI->db->update('hotel_tbl_icons', array(
                    'icon_src' => 'assets/images/ico/'.$filename
                ));
                // Remove original image
                // unlink($newFilePath);
                 
                return true;
            }
        }
    }

    return false;
}
/**
 * Check for Hotel gallery images
 * @return boolean
 */
function handle_hotel_gallery_image_upload($id = '',$key)
{

    if (isset($_FILES['img'.$key]['name']) && $_FILES['img'.$key]['name'] != '') {
        $path        = get_upload_path_by_type('hotel_gallery_image') . $id . '/';

        // Get the temp file path
        $tmpFilePath = $_FILES['img'.$key]['tmp_name'];
        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["img".$key]["name"]);
            $extension          = $path_parts['extension'];
            $extension          = strtolower($extension);
            $allowed_extensions = array(
                'jpg',
                'jpeg',
                'png'
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            _maybe_create_upload_path($path);
            $filename    = $_FILES["img".$key]["name"];
            $newFilePath = $path . "image".$key.".".$extension;
            // Upload the file into the company uploads dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $CI =& get_instance();
                $config                   = array();
                $config['image_library']  = 'gd2';
                $config['source_image']   = $newFilePath;
                $config['new_image']      = 'thumb_' . "image".$key.".".$extension;
                $config['maintain_ratio'] = true;
                $config['width']          = 160;
                $config['height']         = 160;
                $CI->load->library('image_lib', $config);
                $CI->image_lib->resize();
                $CI->image_lib->clear();
                $CI->db->where('id', $id);
                $CI->db->update('hotel_tbl_hotels', array(
                    'Image'.$key => "image".$key.".".$extension
                ));
                // Remove original image
                // unlink($newFilePath);

                return true;
            }
        }
    }

    return true;
}
/**
 * Check for Hotel gallery images
 * @return boolean
 */
function handle_hotel_room_image_upload($count,$id = '')
{
    if (isset($_FILES['room_img']['name'][$count]) && $_FILES['room_img']['name'][$count] != '') {
        $path = get_upload_path_by_type('hotel_room_image') . $id . '/';

        // Get the temp file path
            $tmpFilePath = $_FILES['room_img']['tmp_name'][$count];

        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            
            // Getting file extension
            $path_parts         = pathinfo(basename($_FILES['room_img']['name'][$count]));
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'jpg',
                'jpeg',
                'bmp'
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            _maybe_create_upload_path($path);
            
            $filename    = $_FILES['room_img']['name'][$count];
            $newFilePath = $path . $filename;
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                $CI =& get_instance();
                $config                   = array();
                $config['image_library']  = 'gd2';
                $config['source_image']   = $newFilePath;
                $config['new_image']      = $filename;
                $config['maintain_ratio'] = true;
                $config['width']          = 160;
                $config['height']         = 160;
                $CI->load->library('image_lib', $config);
                $CI->image_lib->resize();
                $CI->image_lib->clear();
                $CI->db->where('id', $id);
                $CI->db->update('hotel_tbl_hotel_room_type', array(
                    'images' => $filename
                ));
                // Remove original image
                return true;
            }

        }
    }

    return false;
}
function handle_hotel_room_image_login_upload($hotel_room_id = '')
{
       
    if (isset($_FILES['image-file']['name']) && $_FILES['image-file']['name'] != '') {
        $path = get_upload_path_by_type('hotel_room_image') . $hotel_room_id . '/';

        // Get the temp file path
            $tmpFilePath = $_FILES['image-file']['tmp_name'];

        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            
            // Getting file extension
            $path_parts         = pathinfo(basename($_FILES['image-file']['name']));
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'jpg',
                'jpeg',
                'bmp'
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            _maybe_create_upload_path($path);
            
            $filename    = $_FILES['image-file']['name'];
            $newFilePath = $path . $filename;
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                $CI =& get_instance();
                $config                   = array();
                $config['image_library']  = 'gd2';
                $config['source_image']   = $newFilePath;
                $config['new_image']      = $filename;
                $config['maintain_ratio'] = true;
                $config['width']          = 160;
                $config['height']         = 160;
                $CI->load->library('image_lib', $config);
                $CI->image_lib->resize();
                $CI->image_lib->clear();
                $CI->db->where('id', $hotel_room_id);
                $CI->db->update('hotel_tbl_hotel_room_type', array(
                    'images' => $filename
                ));
                // Remove original image
                return true;
            }

        }
    }

    return false;
}
function handle_hotel_review_image_upload($id = '')
{

   if (isset($_FILES['profile_image']['name']) && $_FILES['profile_image']['name'] != '') {
        $path = get_upload_path_by_type('hotel_review_pic') . $id . '/';

        // Get the temp file path
        $tmpFilePath = $_FILES['profile_image']['tmp_name'];
        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["profile_image"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'jpg',
                'jpeg',
                'png'
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            _maybe_create_upload_path($path);
            $filename    = $_FILES["profile_image"]["name"];
            $newFilePath = $path . $filename;
            // Upload the file into the company uploads dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $CI =& get_instance();
                $config                   = array();
                $config['image_library']  = 'gd2';
                $config['source_image']   = $newFilePath;
                $config['new_image']      = 'thumb_' . $filename;
                $config['maintain_ratio'] = true;
                $config['width']          = 160;
                $config['height']         = 160;
                $CI->load->library('image_lib', $config);
                $CI->image_lib->resize();
                $CI->image_lib->clear();
                $CI->db->where('id', $id);
                $CI->db->update('hotel_tbl_review', array(
                    'profile_image' => $filename
                ));
                // Remove original image
                // unlink($newFilePath);

                return true;
            }
        }
    }
    return false;
}
function get_upload_path_by_type($type)
{
    switch ($type) {
         case 'agent_logo_pic':
            return HOTEL_AGENT_LOGO_FOLDER;
        break;
        case 'agent_profile_pic':
            return AGENT_PROFILE_ATTACHMENTS_FOLDER;
        break;
        case 'user_profile_pic':
            return USER_PROFILE_ATTACHMENTS_FOLDER;
        break;
        case 'general':
            return GENERAL_ATTACHMENTS_FOLDER;
        break;
        case 'icon_up':
            return ICON_UP_ATTACHMENTS_FOLDER;
        break;
        case 'hotel_gallery_image':
            return HOTEL_GALLERY_ATTACHMENTS_FOLDER;
        break;
        case 'hotel_room_image':
            return HOTEL_ROOM_ATTACHMENTS_FOLDER;
        break;
        case 'hotel_review_pic':
            return HOTEL_REVIEW_ATTACHMENTS_FOLDER;
        break;
        case 'trade_license_pic':
            return HOTEL_TRADE_LICENSE_FOLDER; 
        break;
        case 'about':
            return ABOUT_IMAGES_UPLOAD_FOLDER;
        break;
        case 'event_gallery_image':
            return EVENT_IMAGES_UPLOAD_FOLDER;
        break;
        case 'tour_services':
            return TOUR_SERVICES_IMAGES_FOLDER;
        break;
        case 'passport_image':
            return VISA_REQUEST_PASSPORT_IMAGES_FOLDER;
        break;
        case 'vehicle_image':
            return VEHICLE_IMAGES_FOLDER;
        case 'offline_requests_invoice_pdf':
            return INVOICE_PDF_FOLDER;
        break; 
        default:
        return false;
    }

} 
function about_image_upload() {
    if (isset($_FILES['wall_image']['name']) && $_FILES['wall_image']['name'] != '') {
        $path        = get_upload_path_by_type('about');

        
        // Get the temp file path
        $tmpFilePath = $_FILES['wall_image']['tmp_name'];

        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["wall_image"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'jpg',
                'jpeg',
                'png',
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            
            _maybe_create_upload_path($path);

            $filename    = $_FILES["wall_image"]["name"];
            $newFilePath = $path . $filename;
            
            // Upload the file into the company uploads dir
           move_uploaded_file($tmpFilePath, $newFilePath);
           $CI =& get_instance();
           $CI->db->where('id', 1);
           $CI->db->update('aboutdetails', array(
                    'wall_image' => $filename
                ));
        }
    }
    if (isset($_FILES['front_image']['name']) && $_FILES['front_image']['name'] != '') {
        $path        = get_upload_path_by_type('about');

        
        // Get the temp file path
        $tmpFilePath = $_FILES['front_image']['tmp_name'];

        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["front_image"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'jpg',
                'jpeg',
                'png',
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            
            _maybe_create_upload_path($path);

            $filename    = $_FILES['front_image']['name'];
            $newFilePath = $path . $filename;
            
            // Upload the file into the company uploads dir
           move_uploaded_file($tmpFilePath, $newFilePath);
           $CI =& get_instance();
           $CI->db->where('id', 1);
           $CI->db->update('aboutdetails', array(
                    'front_image' => $filename
                ));
        }
    }
    if (isset($_FILES['back_image']['name']) && $_FILES['back_image']['name'] != '') {
        $path        = get_upload_path_by_type('about');

        
        // Get the temp file path
        $tmpFilePath = $_FILES['back_image']['tmp_name'];

        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["back_image"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'jpg',
                'jpeg',
                'png',
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            
            _maybe_create_upload_path($path);

            $filename    = $_FILES['back_image']['name'];
            $newFilePath = $path . $filename;
            
            // Upload the file into the company uploads dir
           move_uploaded_file($tmpFilePath, $newFilePath);
           $CI =& get_instance();
           $CI->db->where('id', 1);
           $CI->db->update('aboutdetails', array(
                    'back_image' => $filename
                ));
        }
    }
    return true;
}
function event_gallery_image_upload($id = '')
{

    if (isset($_FILES['event_image']['name']) && $_FILES['event_image']['name'] != '') {
        $path        = get_upload_path_by_type('event_gallery_image'). $id . '/';

           
        // Get the temp file path
        $tmpFilePath = $_FILES['event_image']['tmp_name'];

        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["event_image"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'jpg',
                'jpeg',
                'bmp',
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            
            _maybe_create_upload_path($path);

            $filename    = $_FILES["event_image"]["name"];
            $newFilePath = $path . $filename;
            // Upload the file into the company uploads dir
           move_uploaded_file($tmpFilePath, $newFilePath);
           $CI =& get_instance();
           $CI->db->where('id', $id);
           $CI->db->update('eventdetails', array(
                    'event_image' => $filename
                ));
           return true;
        }
    }
    return false;
}
function tour_service_image_upload($id = '')
{

    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
        $path        = get_upload_path_by_type('tour_services'). $id . '/';

           
        // Get the temp file path
        $tmpFilePath = $_FILES['image']['tmp_name'];

        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["image"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'jpg',
                'jpeg',
                'bmp',
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            
            _maybe_create_upload_path($path);

            $filename    = $_FILES["image"]["name"];
            $newFilePath = $path . $filename;
            // Upload the file into the company uploads dir
           move_uploaded_file($tmpFilePath, $newFilePath);
           $CI =& get_instance();
           $CI->db->where('id', $id);
           $CI->db->update('tbl_tour_types', array(
                    'image' => $filename
                ));
           return true;
        }
    }
    return false;
}
function visa_request_passport_image_upload($id = '')
{
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
        $path        = get_upload_path_by_type('passport_image'). $id . '/';
        
        // Get the temp file path
        $tmpFilePath = $_FILES['image']['tmp_name'];

        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["image"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'jpg',
                'jpeg',
                'bmp',
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            
            _maybe_create_upload_path($path);
            $filename    = $_FILES["image"]["name"];
            $newFilePath = $path . $filename;
            // Upload the file into the company uploads dir
           move_uploaded_file($tmpFilePath, $newFilePath);
           $CI =& get_instance();
           $CI->db->where('id', $id);
           $CI->db->update('visa_tbl_requests', array(
                    'image' => $filename
                ));
           return true;
        }
    }
    return false;
}
function vehicle_image_upload($id = '')
{

    if (isset($_FILES['profile_image']['name']) && $_FILES['profile_image']['name'] != '') {
        $path        = get_upload_path_by_type('vehicle_image'). $id . '/';
        
        // Get the temp file path
        $tmpFilePath = $_FILES['profile_image']['tmp_name'];

        // Make sure we have a filepath
        if (!empty($tmpFilePath) && $tmpFilePath != '') {
            // Getting file extension
            $path_parts         = pathinfo($_FILES["profile_image"]["name"]);
            $extension          = $path_parts['extension'];
            $extension = strtolower($extension);
            $allowed_extensions = array(
                'jpg',
                'jpeg',
                'bmp',
            );
            if (!in_array($extension, $allowed_extensions)) {
                return false;
            }
            
            _maybe_create_upload_path($path);
            $filename    = $_FILES["profile_image"]["name"];
            $newFilePath = $path . $filename;
            // Upload the file into the company uploads dir
           move_uploaded_file($tmpFilePath, $newFilePath);
           $CI =& get_instance();
           $CI->db->where('id', $id);
           $CI->db->update('transfer_vehicle', array(
                    'vehicle_image' => $filename
                ));
           return true;
        }
    }
    return false;
}