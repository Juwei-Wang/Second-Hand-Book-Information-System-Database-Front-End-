<?php
include "Utility.php";
//由于插入的ITEM表格里面需要管理员ID，所以本页默认 $administorID 和 $client_id_of_seller 是全局变量（需要传入此页面）
$client_id_of_buyer = "81f9bca4-1801-11ea-b563-d880f859d523";
$administorID = "de97bbd0-17f4-11ea-b563-d880f859d523";
$client_id_of_seller = "81e25d98-1801-11ea-b563-d880f859d523";
//$client_id_of_buyer必须在buyer里面才能插入
//$client_id_of_seller必须在seller里面才能插入
//$ItemsName必须3字符以上
//$ItemsDescription必须5字符以上

?>

<div id="menu"
     style="background-color:#cfcfcf;
         height:100%;
         width:100%;
         float:left;
         text-align: center">
    <!-- 上面是是一个单独的模块的宽度和长度-->
    <!-- 这是一个单独的模块界面 method 叫POST-->
    <form style="margin-top:35px"
          action="<?php echo $_SERVER['PHP_SELF']; ?>"
          method="POST">
        <!-- 这是一个标题 -->
        <p style="font-size:25px;">Item Publishing</p>
        <!-- 这是一个选择框选择商品新旧程度 -->
        <label>
            <select name="item_condition" style="font-size:15px;">
                <option value="all_conditions">all_conditions</option>
                <option value="new">new</option>
                <option value="used_open_box">used_open_box</option>
                <option value="used_very_good">used_very_good</option>
                <option value="used_good">used_good</option>
                <option value="used_acceptable">used_acceptable</option>
            </select>
        </label>

        <!-- 这是一个标题 -->
        <p style="font-size:14px;">Please Select Item Category</p>
        <!-- 这是一个选择框选择商品类别 -->
        <label>
            <select name="ItemCategory" style="font-size:15px;">
                <option value="all_types">all_types</option>
                <option value="books">books</option>
                <option value="electronic_books">electronic_books</option>
                <option value="consumer_electronics">consumer_electronics</option>
                <option value="food">food</option>
                <option value="personal_computers">personal_computers</option>
                <option value="software">software</option>
                <option value="sports_and_outdoors">sports_and_outdoors</option>
                <option value="music">music</option>
                <option value="musical_instrument">musical_instrument</option>
                <option value="video_games">video_games</option>
                <option value="clothes">clothes</option>
                <option value="office_products">office_products</option>
                <option value="others">others</option>
            </select>
        </label>
        <!-- 这是一个标题 -->
        <p style="font-size:14px;">Items name</p>
        <!-- 这是一个输入框输入商品名称 -->
        <label>
            <input type="text" size="20" name="ItemsName" style="font-size:15px;">
        </label>
        <!-- 这是一个标题 -->
        <p style="font-size:14px;">Items prices</p>
        <!-- 这是一个输入框输入商品价格 -->
        <label>
            <input type="text" size="20" name="ItemsPrices" style="font-size:15px;">
        </label>
        <!-- 这是一个标题 -->
        <p style="font-size:14px;">Items number</p>
        <!-- 这是一个输入框输入商品数量 -->
        <label>
            <input type="text" size="20" name="ItemsNumber" style="font-size:15px;">
        </label>

        <p style="font-size:14px;">Items Description</p><label>
            <textarea name="ItemsDescription" rows="8" cols="60" style="font-size:15px;"></textarea>
        </label>
        <!-- 这是一个标题 -->
        <p style="font-size:14px;">Items Picture upload</p>
        <!-- 这是一个上传商品图片的按钮 -->
        Upload Img:<input type="file" name="img"/>
        <!-- 这是三个确认按钮，确认，重置和上传 -->
        <input type="submit" name="Upload" value="Upload" style="font-size:20px;"/>
        <input type="submit" name="Submit" value="Submit" style="font-size:20px;">
        <input type="submit" name="Reset" value="Reset" style="font-size:20px;">


    </form>

    <?php
    // Create connection
    // 从上面输入栏中得到参数
    $conn = Utility\get_a_connection();
    $ItemsName = $_POST['ItemsName'];
    $ItemsPrices = $_POST['ItemsPrices'];
    $ItemsNumber = $_POST['ItemsNumber'];
    $ItemsDescription = $_POST['ItemsDescription'];
    $item_condition = $_POST['item_condition'];
    $ItemCategory = $_POST['ItemCategory'];


    if (isset($_POST['Submit'])) {
        echo "提交成功";
        echo $administorID;

        // Create connection
        $can_publish = false;
        $account_publish = false;
        $visits = 0;
        $picture = "NO PICTURES SUBMISSION";

        //与数据库建立链接
        $sql = $conn->prepare("select * from `item`");
        $sql->bind_param();
        $sql->execute();
        $days_to_expire = 130;

        //把所有从input栏中的得到的参数插入到数据库的Item栏里面
        if (true) {
            // Check the length of the username
            if (true) {
                // Check if the username is unique
                if (Utility\is_valid_price($ItemsPrices) === true) {
                    // Check the length of the password
                    if (Utility\description_min_length($ItemsDescription) === true) {
                        // Check the length of the password question
                        if (Utility\is_valid_item_condition($item_condition) === true) {
                            // Check the length of the answer of the password question
                            if (Utility\is_valid_item_type($ItemCategory) === true) {
                                // Check the format of the phone number
                                if ($ItemsNumber > 0) {
                                    echo "上传成功";
                                    echo $ItemsName;
                                    echo $ItemsDescription;
                                    echo $ItemsPrices;
                                    echo $ItemCategory;
                                    echo $client_id_of_buyer;
                                    echo $client_id_of_seller;

                                    // Insert a new item to 'client'
                                    $sql = $conn->prepare("insert into `item`
                                    (id,name,description,condition,price,type,client_id_of_buyer, client_id_of_seller
                                     ) values (uuid(), ?, ?, ?, ?, ?, ?, ?);");
                                    $sql->bind_param("sssdsss",
                                        $ItemsName,
                                        $ItemsDescription,
                                        $item_condition,
                                        $ItemsPrices,
                                        $ItemCategory,
                                        //由于刚刚发布商品，买家默认是0
                                        $client_id_of_buyer,
                                        //全局变量
                                        $client_id_of_seller);
                                    $sql->execute();
                                    echo "上传成功";
                                } else {
                                    Utility\alert("Not valid ItemPrice");
                                }
                            } else {
                                Utility\alert("Not valid ItemPrice");
                            }
                        } else {
                            Utility\alert("Not valid ItemsDescription");
                        }
                    } else {
                        Utility\alert("Not valid ItemPrice");
                    }
                } else {
                    Utility\alert("No problem");
                }
            } else {
                Utility\alert("No problem");
            }
        }

        // Close connection
        $sql->close();
        mysqli_close($conn);
    }
    ?>


</div>
