<table class="form-table">
    <tr>
        <th><label for="huong"><strong>Hướng </strong>:</label></th>
        <td><input type="text" id="huong" name="huong" value="<?php echo $huong?>" size="80" /></td>
    </tr>
    <tr>
        <th><label for="dien_tich_dat"><strong>Diện tích đất </strong>:</label></th>
        <td><input type="text" id="dien_tich_dat" name="dien_tich_dat" value="<?php echo $dien_tich_dat?>" size="80" /></td>
    </tr>
    <tr>
        <th><label for="dien_tich_xay_dung"><strong>Diện tích xây dựng </strong>:</label></th>
        <td><input type="text" id="dien_tich_xay_dung" name="dien_tich_xay_dung" value="<?php echo $dien_tich_xay_dung?>" size="80" /></td>
    </tr>
    <tr>
        <th><label for="vi_tri"><strong>Vị trí </strong>:</label></th>
        <td><input type="text" id="vi_tri" name="vi_tri" value="<?php echo $vi_tri?>" size="80" /></td>
    </tr>
    <tr>
        <th><label for="tien_do_thanh_toan"><strong>Tiến độ thanh toán </strong>:</label></th>
        <td><input type="text" id="tien_do_thanh_toan" name="tien_do_thanh_toan" value="<?php echo $tien_do_thanh_toan?>" size="80" /></td>
    </tr>
    <tr>
        <th><label for="gia"><strong>Giá </strong>:</label></th>
        <td><input type="text" id="gia" name="gia" value="<?php echo $gia?>" size="80" /></td>
    </tr>
    <tr>
        <th><label for="status"><strong>Trạng thái </strong>:</label></th>
        <td>
            <select name="status" id="status">
                <option value="0"<?php echo $status!='1' ? ' selected="selected"' : ''?>>Chưa bán</option>
                <option value="1"<?php echo $status=='1' ? ' selected="selected"' : ''?>>Đã bán</option>
            </select>
        </td>
    </tr>
</table>