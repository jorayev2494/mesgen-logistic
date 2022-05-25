<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Traits\FileTrait;
use Illuminate\Contracts\Pagination\Paginator;

class UserService {
    
    use FileTrait;

    public function __construct(
        private UserRepository $repository
    )
    {

    }

    /**
     * @param boolean $isAdmin
     * @param integer|null $perPage
     * @return Paginator
     */
    public function index(bool $isAdmin, int $perPage = null): Paginator
    {
        return $this->repository->getPaginate($isAdmin, $perPage);
    }

    /**
     * @param array $data
     * @return User
     */
    public function store(array $data): User
    {
        if (array_key_exists('avatar', $data)) {
            [
                'full_path' => $data['avatar'],
                'extension' => $data['extension']
            ] = $this->uploadFile(User::AVATAR_PATH, $data['avatar']);
        }

        $data['password'] = \Illuminate\Support\Str::uuid();
        $user = $this->repository->create($data);

        return $user;
    }

    /**
     * @param integer $id
     * @return User
     */
    public function show(int $id): User
    {
        return $this->repository->find($id);
    }

    /**
     * @param integer $id
     * @param array $data
     * @return User
     */
    public function update(int $id, array $data): User
    {
        /** @var User $foundUser */
        $foundUser = $this->repository->find($id);

        if (array_key_exists('avatar', $data)) {
            [
                'full_path' => $data['avatar'],
                'extension' => $data['extension']
            ] = $this->updateFile(User::AVATAR_PATH, $foundUser->avatar, $data['avatar']);
        }

        $foundUser->update($data);

        return $foundUser->refresh();
    }

    /**
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->repository->find($id)->delete();
    }
}