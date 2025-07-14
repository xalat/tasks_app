const API_BASE_URL = import.meta.env.VITE_API_BASE_URL;

export const projectsService = {
    async getAllProjects() {
        const response = await fetch(`${API_BASE_URL}/projects`);
        if (!response.ok) {
            throw new Error('Failed to fetch projects');
        }
        return response.json();
    },

    async createProject(projectData) {
        const response = await fetch(`${API_BASE_URL}/projects`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(projectData),
        });
        if (!response.ok) {
            throw new Error('Failed to create project');
        }
        return response.json();
    },

    async getProjectDetails(id) {
        const response = await fetch(`${API_BASE_URL}/projects/${id}`);
        if (!response.ok) {
            throw new Error('Failed to fetch project details');
        }
        return response.json();
    }
};