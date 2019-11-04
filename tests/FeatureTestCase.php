<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class FeatureTestCase extends TestCase
{
    // use DatabaseMigrations; no se utiliza por ejecuta toda la migracion 
    // (depende de la cantidad de migraciones q tenga)
    use DatabaseTransactions;
}
