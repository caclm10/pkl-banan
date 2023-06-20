<?php

namespace App\Commands;

use App\Models\AdminModel;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class CreateAdmin extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'App';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'create:admin';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Generate a new admin in the database';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'create:admin';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $nama = CLI::prompt('Nama', null, ['required']);
        $email = CLI::prompt('Email', null, ['required', 'valid_email']);
        $password = password_hash(CLI::prompt('Password', null, ['required', 'min_length[6]', 'max_length[20]']), PASSWORD_DEFAULT);

        $adminModel = new AdminModel();

        $adminModel->save([
            'nama' => $nama,
            'email' => $email,
            'password' => $password
        ]);

        CLI::write('');
        CLI::write("Admin created");
    }
}
