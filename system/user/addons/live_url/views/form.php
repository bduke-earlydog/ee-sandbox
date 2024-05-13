<p>Use this to set up manufactured URLs for each of your entries. You can use global variables and channel entry tags in your URL as well. Leave blank to use our intuitive model (Structure => Pages => Channel URL => Best guess).</p>
<div>
    <form action="<?=$post_url?>" method="POST" accept-charset="utf-8">
        <input type="hidden" name="csrf_token" value="<?=CSRF_TOKEN?>">
        <table>
            <tbody>
                <?php foreach ($channels as $channel) : ?>
                    <tr>
                        <td>
                            <input type="hidden" name="channel_id[]" value="<?=$channel['channel_id']?>">
                            <?=$channel['channel_title']?>
                        </td>
                        <td>
                            <input type="text" name="channel_url[]" value='<?=$channel['live_url']?>'>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Submit" class="submit">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>