<?php

class TestUser extends TestCase
{
    public function test_index()
    {
        $output = $this->request('GET', 'Welcome/index');
        
        $this->assertStringContainsString(
            '<title>Login</title>', $output
          );
    }
     public function test_strong()
    {
        $output = $this->request('GET', 'Welcome/index');
        
        $this->assertStringContainsString(
            '<strong>CUYOTEC LOGIN</strong>', $output
          );
    }
}