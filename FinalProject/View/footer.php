<!-- Footer Template -->

<footer class="footer">
    <?php 
        // $counter = Counter::ReadPageCounter();

        echo "<span class='footer__author'>Designed by  {$pageData['author']} &copy;</span><br>";
        echo COMPANY_NAME;
        echo '<br>' . COMPANY_STREET_ADDRESS . ' ' . COMPANY_CITY . ' ' . COMPANY_PROVINCE . ' ' . COMPANY_POSTAL_CODE . '<br>' . COMPANY_EMAIL . ' ' . '<br>' . COMPANY_PHONE . '<br>';

        // echo "Visitors : {$counter}";
    ?>
</footer>
</body>
</html>