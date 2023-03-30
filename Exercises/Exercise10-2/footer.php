
<!-- FOOTER -->
<footer>
    Designed by <?= $pageData['author'] ?> &copy;<br>
    <?= COMPANY_NAME ?>
    <?php echo '<br>' . COMPANY_STREET_ADDRESS . ' ' . COMPANY_CITY . ' ' . COMPANY_PROVINCE  . ' ' . COMPANY_POSTAL_CODE . '<br>' . COMPANY_EMAIL . ' ' . COMPANY_PHONE . '<br>';
            $counter = Counter::ReadPageCounter();
            echo "The Total Amount of views is {$counter}";
    
    ?>

</footer>
</div>
</body>

</html>