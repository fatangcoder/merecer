<script>
    passId(cat_id) {
    var product_category = [];
        <?php 
            $command = "select * from product_categories where cat_id =". $res['cat_id']."";
            $productQuery = mysqli_query($con,$command);
            while ( $result = mysqli_fetch_array($productQuery)) {
                product_category.push($result);
            }
            console.log("product_category");
        ?>
    }
</script>



SELECT  *
FROM    ( SELECT    ROW_NUMBER() OVER ( ORDER BY OrderDate ) AS RowNum, *
          FROM      Orders
          WHERE     OrderDate >= '1980-01-01'
        ) AS RowConstrainedResult
WHERE   RowNum >= 1
    AND RowNum < 20
ORDER BY RowNum