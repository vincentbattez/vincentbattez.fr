<?php
namespace App\Test\TestCase\Form;

use App\Form\ContactForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\ContactForm Test Case
 */
class ContactFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\ContactForm
     */
    public $ContactForm;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->ContactForm = new ContactForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContactForm);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
