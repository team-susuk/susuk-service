export interface Guide {
    uuid: string;
    name: string;
    nick_name: string;
    birthday: string;
    birthday_formated: string;
    phone_number: string;
    profile: string;
    profession_id: number;
    profession: string;
    languages: string;
    status: string;
    is_member: integer;
    code: string;
    qrcode_id: string;
    is_member: boolean;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        guide: Guide;
    };
    flash: {
        error?: string;
        success?: string;
        popup_success?: string;
    },
    logo_bca: string
};
