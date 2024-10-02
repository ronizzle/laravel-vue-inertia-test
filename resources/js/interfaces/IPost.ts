import IUser from './IUser';

export default interface IPost {
    title: string;
    body: string;
    user: IUser
}
